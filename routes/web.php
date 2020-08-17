<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PodcastController@index');

Route::middleware('auth')->group(function(){
   
   
    Route::get('/dashboard/profile','UserController@profile');
    Route::post('/profile/update','UserController@profileUpdate');
    Route::post('/profile/avatar/update','UserController@updateAvatar');
    Route::get('/dashboard/favourite','UserController@userLikes');
    Route::get('/dashboard/history','UserController@userHistory');
    Route::post('/dashboard/podcast/update/{id}','PodcastController@update');
    
    
    Route::get('/podcast/likes','PodcastlikesController@userLikes');
    Route::get('/podcast/history','PodcastviewsController@userHistory');
    Route::get('/podcast/listen/{id}','PodcastController@listen');
    Route::get('/profile/{id}','UserController@userProfile');
});

Route::middleware(['auth', 'creator'])->group(function () {
    Route::get('/dashboard', 'UserController@userDashboard');
    Route::get('/dashboard/podcast','PodcastController@userPodcast');
    Route::get('/dashboard/podcast/create','PodcastController@create');
    Route::get('/dashboard/podcast/edit/{id}','PodcastController@edit');
    Route::get('/dashboard/podcast/delete/{id}','PodcastController@destroy');
    Route::post('/dashboard/podcast','PodcastController@addPodcast');
    Route::get('/dashboard/podcast/publish/{id}','PodcastController@publish');
});

Route::get('/login','UserController@create')->name('login');
Route::post('/login','UserController@login');
Route::get('/signup','UserController@createSignup');
Route::post('/signup','UserController@signup');
Route::get('/logout','UserController@logout');
Route::get('/reset','UserController@reset');
Route::post('/reset/mail','UserController@resetMail');
Route::post('/reset/password','UserController@resetPassword');
Route::get('/newpassword','UserController@newPassword')->name('newpassword');


Route::get('/podcasts','PodcastController@podcasts');
Route::get('/podcasts/{category}','PodcastController@podcastCategory');
Route::get('/about','PodcastController@about');
Route::get('/contact','PodcastController@contact');
Route::post('/enqueries','EnqueryController@Enqueries');

