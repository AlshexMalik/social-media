<?php

namespace App\livewire;
use App\Models\posts;
use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Showcomment extends Component
{    
  
    public $posts;
    public $user;
    public $showcomment;
    public function mount($id){
        $posts = posts::find($id);
        $this->posts = $posts; 
         
        $this->showcomment = json_decode($posts->comment, true);
        session(['title' => 'Comment']);
        
    }
    public $boxVisible = false;
    public $id;
    public function toggleBoxVisibility($id){
        $this->id = $id;
        $this->boxVisible = !$this->boxVisible;

    }
    public function render()
    {   
        return view('livewire.showcomment');
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

        $userid = Auth::id();
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

public function submit($idd){
 
    $post = posts::findOrFail($idd);
    $comments = json_decode($post->comment, true) ?? [];

    // Add the new comment
    $newComment = [
        'user_id' => Auth::id(), // Assuming you're using authentication
        'comment' => $this->comment,
    ];
    $comments[] = $newComment;

    // Update the JSON column with the new comments
    $post->update(['comment' => json_encode($comments)]);

    // Clear the comment field
    
    $this->reset(); 
    }
}
