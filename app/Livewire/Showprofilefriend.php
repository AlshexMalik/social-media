<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\User;
use App\Models\posts;
use App\Models\like;
use App\Models\friend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;

class Showprofilefriend extends Component
{
    public $userid;
    public $user; 
    public $friend;
    public $side;
    public $side2;
    public $like;
    public $friendcount;

    public function mount(){
        $this->userid = request()->query('id');
        if($this->userid){
        $this->user = User::find($this->userid);
        if($this->user){
            $userid = $this->userid;   
            $this->like = posts::where('user_id', $userid)->sum('like');
            $side = User::select(
                DB::raw('users.photo AS photo'),
                DB::raw('users.first_name AS name'),
                DB::raw('users.middle_name AS last')
            )
            ->join('friend', 'users.id', '=', 'friend.reciver')
            ->where('friend.id_user_sender', $userid)
            ->orderBy('friend.created_at')
            ->get();
        
            $side2 = User::select(
                DB::raw('users.photo AS photo'),
                DB::raw('users.first_name AS name'),
                DB::raw('users.middle_name AS last')
            )
            ->join('friend', 'users.id', '=', 'friend.reciver')
            ->where('friend.reciver', $userid)
            ->orderBy('friend.created_at')
            ->get();
        
            $results = $side->union($side2);
            $this->friendcount = count($results);   
            session(['title' => 'show Profile']);
            $this->friend  = $results; 
        }else{
            return redirect()->route('myfriend');
        }
       
        }else{
            return redirect()->route('myfriend');
        }
        
    
    }
 
    
    
    public function render(){
        $user = User::find($this->userid);
        $userid = $this->userid;
        $posts = DB::table('posts')
        ->where('user_id', $userid)->get();
        return view('livewire.showprofilefriend',compact('posts'), compact('user'));
         
    }

    public $boxVisible = false;
    public $id;
    public function toggleBoxVisibility($id){
        $this->id = $id;
        $this->boxVisible = !$this->boxVisible;

    }

    


    
    public function timeAgo($datetime){

        $datetime = Carbon::parse($datetime);
        $difference = Carbon::now()->diffInSeconds($datetime);
        
        $periods = [
            'year'   => 31556926,
            'month'  => 2629744,
            'week'   => 604800,
            'day'    => 86400,
            'hour'   => 3600,
            'minute' => 60,
            'second' => 1
        ];

        foreach ($periods as $period => $value) {
            if ($difference >= $value) {
                $count = floor($difference / $value);
                $plural = $count > 1 ? 's' : '';
                return $count . ' ' . $period . $plural . ' ago';
            }
        }

        return 'just now';
    }

    public function like($id){

        $userid = $this->userid;
        $postid = $id;
    
        $like = DB::table('like')->where('user_id', $userid)
                    ->where('post_id', $postid)->get();
        
        if(count($like) == 0) {
            return false;
        } else {
            return true;
        }
    }
 
     
    public function likee($id){
        $userid = Auth::id();
        posts::where('id', $id)->increment('like', 1);
        DB::insert('INSERT INTO `like` (`user_id`, `post_id`, `state`) VALUES (?, ?, "like")', [$userid, $id]);
        
    }

public function unlike($id){
    $userid = Auth::id();
    posts::where('id', $id)->decrement('like', 1);
    DB::delete('DELETE FROM `like` WHERE `post_id`= ?', [$id]);
    
}


public $comment;
public $idd;

public function submit($idd){
 
    $post = posts::findOrFail($idd);
    $comments = json_decode($post->comment, true) ?? [];

    // Add the new comment
    $newComment = [

        'user_img' => Auth::user()->photo, // Assuming you're using authentication
        'user_name' => Auth::user()->first_name, // Assuming you're using authentication
        'comment' => $this->comment,
    ];
    $comments[] = $newComment;

    // Update the JSON column with the new comments
    $post->update(['comment' => json_encode($comments)]);

    // Clear the comment field
    $this->toggleBoxVisibility = false;
    return $this->reset(); 
    }


}
