<?php

namespace App\Models;

use App\Models\User;
use App\Models\Expectation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserExpectation extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function expectations()
    {
        return $this->belongsToMany(Expectation::class);
    }

    protected $fillable = [
        'content',
        'expectations_id',
        'expect',
    ];
}
