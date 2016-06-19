<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

    // First get new tweets.
    $tt = new App\White\TweetSeeker();
    $tt->checktweets();

    // Display
    $tweets = App\Tweet::orderBy('tw_created_at','DESC')->paginate(10);
    return view('tweets')->with('tweets',$tweets);
});

Route::get('/calculate', function(){
    $tt = new App\White\TweetSeeker();
    $tt->checktweets();
});

Route::auth();

Route::get('/home', 'HomeController@index');
