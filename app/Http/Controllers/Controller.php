<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Expectation;
use App\Traits\HttpResponses;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use HttpResponses;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
       
        return $this->success([
           'posts' => Post::all()->count(),
           'expectation' => Expectation::all()->count(),
           'users' => User::all()->count(),
           'news' => Article::all()->count(),
           'cmments' => Comment::all()->count(),

        ]);
    }
}
