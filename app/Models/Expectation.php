<?php

namespace App\Models;

use App\Models\UserExpectation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expectation extends Model
{
    use HasFactory;

    public function userExpectations()
    {
        return $this->hasMany(UserExpectation::class);
    }
    protected $fillable = [
        'team_1',
        'team_2',
        'Competition',
        'result',
    ];
}
