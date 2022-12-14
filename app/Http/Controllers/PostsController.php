<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Expectation;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;

class PostsController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return $this->success([
            'posts' => Post::all()->count(),
            'expectation' => Expectation::all()->count(),
            'users' => User::all()->count(),
            'news' => Article::all()->count(),
            'cmments' => Comment::all()->count()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);
        $comment = Post::create([
            'user_id' => Auth::user()->id,
            'content' => $request->content
        ]);

        return $this->success('', 'comment created successfully', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (!$this->isAuthorize($post)) {
            return $this->error('', 'you are not authorize to update', 403);
        }
        $request->validate([
            'content' => 'required|string',
        ]);
        $post->update([
            'content' => $request->content
        ]);

        return $this->success('', 'comment updated successfully', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        return $this->isAuthorize($post) ? $post->delete() : $this->error('', 'you are not authorize to delete this comment', 403);
    }

    protected function isAuthorize($comment)
    {
        return Auth::user()->id == $comment->user_id ? true : false;
    }
}
