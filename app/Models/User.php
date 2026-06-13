<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;  // <-- add this
use App\Models\Post;

class User extends Authenticatable
{
    use HasFactory, Notifiable;  // <-- add HasFactory here

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function usersCoolPosts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }
}
