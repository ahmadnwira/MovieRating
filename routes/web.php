<?php


Route::get('/', 'MovieController@index')->name('movies');

Route::get('/new/movie', 'MovieController@create')->name('new_movie');
Route::post('/movies', 'MovieController@store');

Route::get('/movies/show/{movie}', 'MovieController@show');

Route::get('/movies/edit/{movie}', 'MovieController@edit');
Route::post('/movies/update/{movie}', 'MovieController@update');

Route::get('/movies/delete/{movie}', 'MovieController@destroy')->name('delete_movie');;


/* Ratings Routes */
Route::get('/ratings', 'RatingController@index')->name('ratings');

Route::get('/new/rating', 'RatingController@create');
Route::post('/ratings', 'RatingController@store');

Route::get('/ratings/show/{movie}', 'RatingController@show');

Route::get('/ratings/edit/{rating}', 'RatingController@edit');
Route::post('/ratings/update', 'RatingController@update')->name('update_rating');

Route::get('/ratings/delete/{rating}', 'RatingController@destroy')->name('delete_rating');

/* user routes */
Route::get('/profile', 'UserController@profile')->name('profile');

Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@signin');

Route::get('/register', 'UserController@register')->name('register');
Route::post('/register', 'UserController@store');

Route::get('/logout', 'UserController@destroy')->name('logout');

/* Admin Routes */
Route::get('/mange/movies', 'AdminController@movies');