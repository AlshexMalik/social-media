<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    
    protected $guarded = [];
    protected $table = 'posts';

    // Define any relationships if needed
    // For example, if a post belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'title', 'id');
    }
    use HasFactory;
}
