<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\SignIn;
use App\Livewire\Userhome;
use App\Livewire\Showcomment;
use App\Livewire\Showmember;
use App\Livewire\Register;
use App\Livewire\userprofile;
use App\Livewire\Myfriend;
use App\Livewire\showprofilefriend;
use App\Livewire\addpost;


 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    
    Route::get('/', home::class);
    Route::get('/SignIn', SignIn::class);
    Route::get('/Register', Register::class);
});

Route::middleware('auth')->group(function () {

Route::get('/home', Userhome::class);
Route::get('/showmembers', Showmember::class)->name('showmembers');
Route::get('/comment/{id}', Showcomment::class);
Route::get('/profile/{name}', userprofile::class);
Route::get('/myfriend', Myfriend::class)->name('myfriend');
Route::get('/profile', showprofilefriend::class);
Route::get('/AddPost', addpost::class)->name('AddPost');



});
