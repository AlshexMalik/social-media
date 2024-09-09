<?php

namespace App\livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\User;
use App\Models\posts;
use App\Models\friend;
use App\Models\like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class Showmember extends Component
{   
    
    
    public $showmembers;
    public function mount(){
        $this->showmembers;
 
            session(['title' => 'Add Friend']);
  
    }
    public $confirming = false;

    public function confirmAction()
    {
        $this->confirming = true;
    }

    public function render(){
        
        $this->getuser();
        return view('livewire.showmember');
    
    }
    public function yesadd($id){
        $userid =Auth::id();
        DB::table('friend')->insert([
            'id_user_sender' => $userid,
            'state' => 'unfriend',
            'reciver' => $id,
            'created_at' => now(),  // Assuming you have timestamps in your table
            'updated_at' => now(),
        ]);
        $this->confirming = false;
        
        $this->getuser();
        return view('livewire.showmember');
    }

   public function getuser(){
    $userid =Auth::id();
    $users = User::orderBy('id')->pluck('id')->toArray();
    
    $sender = DB::table('friend')
    ->where('id_user_sender', $userid)
    ->pluck('reciver')->map(function($value){
        return (int) $value;
    })->toArray();
    
    $reciver = DB::table('friend')
    ->where('reciver', $userid)
    ->pluck('id_user_sender')->map(function($value){
        return (int) $value;
    })->toArray();
    
    $filterID = array_values(array_diff($users, $sender, $reciver));
    $showmembers = User::whereIn('id', $filterID)->where('id', '!=',  $userid )->get();
    
    $this->showmembers = $showmembers;
    
    }
}
