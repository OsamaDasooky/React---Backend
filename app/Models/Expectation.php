<?php

namespace App\Models;

use App\Models\UserExpectation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expectation extends Model
{
    use HasFactory, SoftDeletes;

    public function userExpectations()
    {
        return $this->hasMany(UserExpectation::class);
    }
    protected $fillable = [
        'team_1',
        'team_2',
        'team_2_picture',
        'team_1_picture',
        'points',
        'result',
        "date"
    ];
}
