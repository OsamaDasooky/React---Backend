<?php

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ArticleResource;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// ------------------- public endPoints ----------------------
Route::post('/login',           [AuthController::class , 'userLogin' ]);
Route::post('/register',        [AuthController::class , 'userRegister' ]);




Route::middleware('auth:sanctum')->group(function (){
    // update & delete =>  api/comment/:id
    // create =>  api/comment/
    Route::resource('/comment', CommentsController::class);
    // update & delete =>  api/post/:id
    // create =>  api/post
    Route::resource('/post', PostsController::class);
});


//articles Using Resources
Route::get('/articles', function () {
    return ArticleResource::collection(Article::all());
});

