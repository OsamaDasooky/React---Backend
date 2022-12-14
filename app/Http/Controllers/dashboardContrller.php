<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Expectation;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardContrller extends Controller
{
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return response([
            'status' => 200,
            'deleted' => $id
        ]);
    }

    public function allPosts()
    {
        $allPosts = Post::where('status', 'approved')->get();
        return $this->success($allPosts, 'all posts pulled successfully');
        // return response([
        //     'status'=> 200,
        //     'data' => $allPosts
        // ]);
    }

    public function approve(Post $post)
    {
        // $post = Post::where('id', $id)->get();
        $post->status = 'approved';
        $post->save();

        return $this->success('', 'post approved successsfully');
    }

    public function deny(Post $post)
    {
        // $post = Post::where('id', $id)->get();
        $post->status = 'rejected';
        $post->save();

        return $this->success('', 'post rejected successsfully');
    }

    public function deletePost(Post $post)
    {
        $post->post_id = $post;
        $post->delete();

        return $this->success('',  'post deleted successfully');
    }

    // public function allComments()
    // {
    //     $allComments = Comment::all();


    //     return $this->success($allComments, 'fetch comment done successfully');
    // }

    public function deleteComment(Comment $comment)
    {
        $comment->id = $comment;
        $comment->delete();

        return $this->success('', 'Comment deleted successfully');
    }

    public function updateArticle(Article $article, Request $request)
    {
        // dd($request);
        // return $this->success('', 'C successfully');
        // $article->id =$article;
        // dd($article->article_id);
        // $article->list_author = $request->author;
        // $article->list_title = $request->title;
        // $article->list_excerpt = $request->excerpt;
        // $article->list_summary = $request->summary;

        $article->update([
            'list_author' => $request->author,
            'list_title' => $request->title,
            'list_excerpt' => $request->excerpt,
            'list_summary' => $request->summary,
        ]);

        return $this->success($article, 'aritcles updated successfully');
    }
    public function updateExpectation(Expectation $expectation, Request $request)
    {

        $expectation->update([

            'points' => $request->points,
            'result' => $request->result,
            'date' => $request->date,
            'team_2_picture' => $request->team_2_picture,
            'team_2' => $request->team_2,
            'team_1_picture' => $request->team_1_picture,
            'team_1' => $request->team_1,

        ]);

        return $this->success($expectation, 'expectation updated successfully');
    }

    public function addNewArticle(Request $request)
    {
        $newArticle = new Article;
        $newArticle->list_author = $request->author;
        $newArticle->list_title = $request->title;
        $newArticle->list_media = 'need to be fixed';
        $newArticle->list_excerpt = $request->excerpt;
        $newArticle->list_summary = $request->summary;

        $newArticle->save();

        return $this->success('', 'new Article added successfully');
    }

    public function deleteArticle(Article $article)
    {
        $article->id = $article;
        $article->delete();

        return $this->success('', 'Article deleted successfully');
    }

    public function deleteExpectation(Expectation $expectation)
    {

        $expectation->id = $expectation;
        $expectation->delete();

        return $this->success('', 'Article deleted successfully');
    }
}
