<?php

namespace App\Livewire;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use App\models\User;

use Livewire\Component;
 
class SignIn extends Component
{
    public function mount()
    {
        session(['title' => 'Sign In']);
    }

#[Validate('required|min:3')] 
public $email;
#[Validate('required|min:8')]     
public $password;
    
    public function signin(){
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // Authentication successful
            
            return $this->redirect('/home',navigate:true);
             // Redirect to the dashboard or another page
        }else{
            session()->flash('error', 'Email Or Passsword is wrong.');
            return redirect()->to('SignIn');
        }



    }

    public function render()
    {   

        return view('livewire.sign-in');
    }
}
