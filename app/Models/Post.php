<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'user_id',
<<<<<<< HEAD
        'featured_image',
=======
>>>>>>> cee8697e9ba19fb2b747be2ef3a1b4e160b17010
        'title',
        'slug',
        'body',
        'image',
<<<<<<< HEAD
=======
        'category',
>>>>>>> cee8697e9ba19fb2b747be2ef3a1b4e160b17010
        'status',
        'views',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
