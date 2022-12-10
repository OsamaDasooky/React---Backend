<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
Route::post('/showArticles',        [AuthController::class , 'showArticles' ]);



Route::middleware('auth:sanctum')->group(function (){
    // update & delete =>  api/comment/:id
    // create =>  api/comment/
    Route::resource('/comment', CommentsController::class);
});
