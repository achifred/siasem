<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->group( function () {
   
});
Route::post('/podcast/addview/{podcast_id}/{user_id}','PodcastviewsController@addViews');
Route::get('/podcast/{podcast_id}/comment','CommentController@fetchComment');
Route::post('/podcast/{podcast_id}/comment','CommentController@addComment');
Route::post('/podcast/like/{podcast_id}','PodcastlikesController@addLike');
Route::delete('/comment/delete/{id}','CommentController@destroy');