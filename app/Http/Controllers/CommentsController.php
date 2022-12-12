<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
            'post_id' => 'required|integer'
        ]);
        $comment =Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $request->post_id,
            'content' => $request->content
        ]);

        return $this->success('','comment created successfully',201);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if (!$this->isAuthorize($comment)) {
            return $this->error('','you are not authorize to update',403);
        }
        $request->validate([
            'content' => 'required|string',
        ]);
        $comment->update([
            'content' => $request->content
        ]);

        return $this->success('','comment updated successfully',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        return $this->isAuthorize($comment) ? $comment->delete() : $this->error('','you are not authorize to delete this comment',403);
    }

     protected function isAuthorize($comment)
    {
       return Auth::user()->id == $comment->user_id ? true : false;
    }
}
