<?php

namespace App\Livewire;
use App\models\user;
use App\models\posts;

use Livewire\Component;

class Count extends Component
{
    public $users , $posts , $likes , $comments;

    public function mount(){
        $this->users = user::count();
        $this->posts = posts::count();
        $this->likes = posts::sum('like');
        $this->comments = posts::sum('comment');
    }
    public function render()
    {
        return view('livewire.count');
    }
}
