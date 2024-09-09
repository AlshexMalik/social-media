<?php

namespace App\Livewire;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use App\models\User;
use Livewire\Component;

class Navbar extends Component
{   
    public $username;

    public function mount(){
        if(Auth::check()){
            $user = Auth::id();
            $user = User::find($user);
            $username = $user->username;
            $this->username = $username; 
        }

    }

    public function logout(){
        auth()->logout();
        return $this->redirect('/');
    }

    public function profile(){
    $user = Auth::id();
    $user = User::find($user);
    $username = $user->username;
    $this->username = $username;
    
        return $this->redirect('/'.$username.'');
    }
    
    public function render()
    {
        return view('livewire.navbar');
    }
}
