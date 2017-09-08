<?php
        Route::get('/', "HomeController@index");
        Route::get('/posts/create', "HomeController@create");
        Route::get('/posts/{post}', "HomeController@show");
        Route::post('/post', "HomeController@store");
        Route::get('/posts/{post}/edit', "HomeController@edit");
        Route::patch('/posts/{post}',"HomeController@update");
        Route::delete('/posts/{post}',"HomeController@destroy");
        Route::post('/addcomment/{post}', "HomeController@addComment");
        Route::delete('/comment/{comment}', "HomeController@deleteComment");
Auth::routes();

Route::get('/index', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('index');

