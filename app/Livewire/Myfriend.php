<?php
namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Myfriend extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $userid = Auth::user()->id;

        $side = User::select(
                DB::raw('users.id AS id'),
                DB::raw('users.photo AS photo'),
                DB::raw('users.first_name AS name1'),
                DB::raw('users.middle_name AS name2'),
                DB::raw('users.last_name AS name3'),
                DB::raw('users.username AS username'),
                DB::raw('users.middle_name AS last')
            )
            ->join('friend', 'users.id', '=', 'friend.reciver')
            ->where('friend.id_user_sender', $userid)
            ->orderBy('friend.created_at');

        $side2 = User::select(
            DB::raw('users.id AS id'),
            DB::raw('users.photo AS photo'),
            DB::raw('users.first_name AS name1'),
            DB::raw('users.middle_name AS name2'),
            DB::raw('users.last_name AS name3'),
            DB::raw('users.username AS username'),
            DB::raw('users.middle_name AS last')
            )
            ->join('friend', 'users.id', '=', 'friend.reciver')
            ->where('friend.reciver', $userid)
            ->orderBy('friend.created_at');

        $query = $side->union($side2);

        if ($this->search) {
            $query->where(function($query) {
                $query->where('users.first_name', 'like', '%' . $this->search . '%')
                      ->orWhere('users.middle_name', 'like', '%' . $this->search . '%')
                      ->orWhere('users.last_name', 'like', '%' . $this->search . '%')
                      ->orWhere('users.username', 'like', '%' . $this->search . '%');
            });
        }

        $friends = $query->paginate(8);

        return view('livewire.myfriend', ['friends' => $friends]);
    }
}
