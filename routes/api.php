<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Expectation;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResources;
use App\Http\Resources\UserResources;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CommentResource;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
use App\Http\Resources\PostResourceAdmin;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Resources\ExpectationResource;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\dashboardContrller;
use App\Http\Controllers\ExpectionController;

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

// google login
Route::post('/google-register', [AuthController::class, 'googleRegister']);

//route for contact page
Route::post('/Contact', [ContactController::class, 'store']);

Route::get('/all-massages', [ContactController::class, 'index']);



// ------------------- authenticated endPoints ----------------------

Route::middleware('auth:sanctum')->group(function () {
    // update & delete =>  api/comment/:id
    // create =>  api/comment/
    Route::resource('/comment', CommentsController::class);
    // update & delete =>  api/post/:id
    // create =>  api/post
    Route::resource('/post', PostsController::class);

    Route::resource('/profile', ProfileController::class);
});




//expectation Using Resources
Route::get('/expectation', function () {
    return ExpectationResource::collection(Expectation::all());
});

//expectation Using Resources
Route::post('/addUserExpectation', [ExpectionController::class, 'store']);




//articles Using Resources
Route::get('/articles', function () {
    return ArticleResource::collection(Article::all());
});









// admin dashboard routes
Route::get('/user/{id}', function ($id) {
    return new UserResources(User::findOrFail($id));
});

Route::get('/users', function () {
    // dd('malek');
    return UserResources::collection(User::all());
});

// delete user
Route::get('/delete-user/{id}', [dashboardContrller::class, 'destroy']);

// to get all counts in the home dashboard
Route::get('/data-counts', [Controller::class, 'index']);

//to get all pending posts
Route::get('/pendingsPost', function () {
    return PostResourceAdmin::collection(Post::where('status', 'pending')->get());
});

// to approve a post
Route::put('/approve-post/{post}', [dashboardContrller::class, 'approve']);

//to deny a post
Route::put('/deny-post/{post}', [dashboardContrller::class, 'deny']);

// to show all posts
Route::get('/all-posts', function () {
    return PostResourceAdmin::collection(Post::where('status', 'approved')->get());
});
// to show all posts FOR USER
Route::get('/allPosts', function () {
    return  PostResources::collection(Post::where('status', 'approved')->orderByDesc('created_at')->get());
});

//to delete a post
Route::get('/delete-post/{post}', [dashboardContrller::class, 'deletePost']);

// to get all comments
Route::get('/all-comments', function () {
    return CommentResource::collection(Comment::all()); //-------------> error pivot table something

});
// Route::get('/all-comments', [dashboardContrller::class, 'allComments']);

// to delete a comment
Route::delete('/delete-comment/{comment}', [dashboardContrller::class, 'deleteComment']);

// to get all aritcles
Route::get('/all-articles', function () {
    return ArticleResource::collection(Article::all());
});

//to update the articles
Route::put('/update-article/{article}', [dashboardContrller::class, 'updateArticle']);


//to add new article
Route::post('/add-article', [dashboardContrller::class, 'addNewArticle']);

// to delete an article
Route::delete('/delete-article/{article}', [dashboardContrller::class, 'deleteArticle']);


//TO delete Expectation
Route::delete('/delete-expectation/{expectation}', [dashboardContrller::class, 'deleteExpectation']);
//to update Expectation
Route::put('/expectation/{expectation}', [dashboardContrller::class, 'updateExpectation']);
//add expectations
Route::post('/addExpectation', [ExpectionController::class, 'addExpectation']);
