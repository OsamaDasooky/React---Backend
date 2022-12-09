<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id',
        'team_1',
        'team_2',
        'Competition',
        'result',

    ];

    public function expectations()
    {
        return $this->hasMany(Comment::class);
    }
}
