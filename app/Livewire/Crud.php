<?php

namespace App\Livewire;
use App\models\user;
use Livewire\Component;
use Livewire\WithPagination;
 
class Crud extends Component
{
    
    public $showbox;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $id;
    public $limited = 10;
    public $query;
    public function render()
    {   if($this->query){
        $users = user::where('username','like', '%'.$this->query.'%')->cursorPaginate($this->limited);
        
    }else{
        $this->showbox = false;
         $users =user::cursorPaginate($this->limited);
    }
       
        return view('livewire.crud',compact('users'));
    }

    public function delet($id)
    {   
        $user = user::find($id);
        $user->delete();
        
        session()->flash('status', 'user successfully delete.');
    }
    


    public function aa($id){   
        $this->showbox = true;
        $this->id = $id;
        $user = user::find($id);
        $this->first_name = $user->first_name;
        $this->middle_name = $user->middle_name;
        $this->last_name = $user->last_name;
        
        session()->flash('status', 'show box.');
        
    }

    public function updateData(){
        
        user::where('id', $this->id)->update([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
        ]);
            
            session()->flash('status', 'user successfully update.');
            $this->showbox = false;
    }

    public function search()
    {
        $this->resetPage();
    }
}

