<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('books/{genere?}', function($genere = null)
{
    if ($genere == null) {
        return 'Books index.';
    }
    return "Books in the {$genere} category.";
});

Route::get('animals/{squirrel}', function($squirrel)
{
    $data['squirrel'] = $squirrel;
    return View::make('simple', $data);
});

Route::get('first',function()
{
    return Redirect::to('second');
});

Route::get('second',function()
{
    return 'Second route.';
});

Route::get('current/url', function()
{
    return URL::current();
});

Route::get('/register', 'RegistrationController@showRegistrationForm');
Route::post('/register', 'RegistrationController@processRegistrationForm');