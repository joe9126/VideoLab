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

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/home',function (){
    return view('pages.home');
});

Route::get('checklogin','AuthController@confirmLogin');

Route::get('signup',function(){
   return view('user.signup');
});

Route::post('post-signup','AuthController@store');

Route::get('sign-in',function(){
    return view('user.login');
});
 

Route::post('post-signin','AuthController@post_signin');

Route::get('logout','AuthController@logout');

Route::get('/getvideos','VideoController@create');

//Route::get('retriveVideo/{videoid}','VideoController@show');

Route::get("videoplayer/{vid}","VideoController@show");

/*Route::get('videoplayer', function (){
    return view('pages.videoplayer');
});*/

Route::post('post_comment','VideoController@postComment');
 
 Route::get("loadcomments","VideoController@loadComments");

 Route::get('profile/{id}','AuthController@show');