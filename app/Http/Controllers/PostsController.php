<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

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
        //
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
            'photo' => 'required|string'
        ]);
        $comment =Post::create([
            'user_id' => Auth::user()->id,
            'photo' => $request->photo,
            'content' => $request->content
        ]);

        return $this->success('','comment created successfully',201);
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
    public function update(Request $request,Post $post)
    {
        if (!$this->isAuthorize($post)) {
            return $this->error('','you are not authorize to update',403);
        }

        $request->validate([
            'content' => 'required|string',
        ]);
        $post->update([
            'content' => $request->content
        ]);

        return $this->success('','comment updated successfully',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        return $this->isAuthorize($post) ? $post->delete() : $this->error('','you are not authorize to delete this comment',403);
    }

    protected function isAuthorize($comment)
    {
       return Auth::user()->id == $comment->user_id ? true : false;
    }
}
