<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaveNew extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
