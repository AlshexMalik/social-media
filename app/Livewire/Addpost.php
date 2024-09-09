<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\User;
use App\Models\posts;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate; 
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class Addpost extends Component
{

    use WithFileUploads;
    public $user;
    
    #[Validate('required')] 
    public $user_id;
    
    #[Validate('required')] 
    public $title;

    #[Validate('required')] 
    public $description;
    
    #[Validate('required')] 
    public $photo;
 



    public function mount(){
        $this->user  = Auth::id();
    }
    public function render()
    {
        return view('livewire.addpost');
    }
    public $filename;
    public function save()
    {
        if ($this->photo) {
            $file = $this->photo;
            $this->filename = date('Ymd') . $file->getClientOriginalName();
    
            // Save the photo to the public/photos directory
             $this->photo->storeAs('public/photos', $this->filename);
        }
    
        $postData = [
            'user_id' => $this->user,
            'title' => $this->title,
            'description' => $this->description,
            'photo' => $this->filename,
        ];
    
        // Save the post to the database
        posts::create($postData);
    
        // Flash a success message
        session()->flash('message', 'Post successfully created.');
    
        // Redirect to the AddPost page
        return $this->redirect('/AddPost');
    }
    
    
    
    
}
