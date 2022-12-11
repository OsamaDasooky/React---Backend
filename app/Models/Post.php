<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    protected $fillable = [
        'content',
        'photo',
        'user_id',
    ];
}
