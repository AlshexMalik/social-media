<?php

namespace App\Livewire;
use Livewire\Attributes\Validate;
use App\models\contacts;
use Livewire\Component;
 

class Contact extends Component
{
    #[Validate('required')]
    public $name = '';
 
    #[Validate('required')]
    public $email = '';
 
    #[Validate('required')]
    public $subject = '';
 
    #[Validate('required')]
    public $message = '';
 
    public function save() 
    {
        $this->validate();
 
        contacts::create($this->only(['name' , 'email' , 'subject' , 'message']));

        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
