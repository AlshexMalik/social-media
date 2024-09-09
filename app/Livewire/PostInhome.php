<?php

namespace App\Livewire;
use App\models\user;
use App\models\posts;
use Livewire\Component;

class PostInhome extends Component
{
    public $toppost;
    public function mount()
    {
        $this->toppost = posts::select('posts.*', 'users.username')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->orderByRaw("CAST(SUBSTRING_INDEX(`like`, ' ', -1) AS UNSIGNED) DESC")
            ->limit(5)
            ->get();
    }

    public function render()
    {   
        
        $posts = Posts::join('users', 'posts.user_id', '=', 'users.id')
        ->select(
            'posts.title',
            'posts.description',
            'posts.photo as post_photo',
            'users.photo as user_photo',
            'posts.like',
            'posts.comment',
            'posts.created_at',
            'users.first_name',
            'users.middle_name'
        )
        ->limit(7)
        ->get();

        return view('livewire.post-inhome',[
            'posts' =>$posts
        ]);
    }
}
