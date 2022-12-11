<?php

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Resources\UserResources;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ArticleResource;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ContactController;

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
Route::post('/login',           [AuthController::class, 'userLogin']);
Route::post('/register',        [AuthController::class, 'userRegister']);

//route for contact page
Route::post('/Contact',[ContactController::class , 'store' ]);

Route::get( '/all-massages',[ContactController::class , 'index' ]);




Route::middleware('auth:sanctum')->group(function () {
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


Route::get('/user/{id}', function ($id) {
    return new UserResources(User::findOrFail($id));
});
