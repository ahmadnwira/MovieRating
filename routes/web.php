<?php

/* movies_routes */
Route::get('/', 'MovieController@index')->name('index');

Route::get('/new/movie', 'MovieController@create')->name('new_movie');
Route::post('/movies', 'MovieController@store');

Route::get('/movies/show/{movie}', 'MovieController@show');

Route::get('/movies/edit/{movie}', 'MovieController@edit');
Route::post('/movies/update/{movie}', 'MovieController@update');

Route::get('/movies/delete/{movie}', 'MovieController@destroy')->name('delete_movie');

Route::post('/movies/rate/{movie}', 'MovieController@rate')->name('rate');


/* user_routes */
Route::get('/register', 'UserController@create')->name('register');
Route::post('/register', 'UserController@store');

Route::get('/profile', 'UserController@profile')->name('profile');

Route::get('users/delete', 'UserController@destroy');

Route::get('users/edit/{user}', 'UserController@edit');
Route::post('users/update/{user}', 'UserController@update');

/* sessions */
Route::get('/login', 'SessionsContoller@create')->name('login');
Route::post('/login', 'SessionsContoller@store');

Route::get('/logout', 'SessionsContoller@destroy')->name('logout');

/* dashboard */
Route::get('/mange/movies', 'AdminController@movies');
Route::get('/mange/users', 'AdminController@users');