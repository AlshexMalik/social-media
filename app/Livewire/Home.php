<?php

namespace App\Livewire;
use Livewire\Component;
use App\models\user;
use App\models\posts;

class Home extends Component
{

    public $toppost;
    public function mount(){

        session(['title' => 'Home-Page']);
        

    }

    
    public function render()
    {
        return view('livewire.home');
    }
}
