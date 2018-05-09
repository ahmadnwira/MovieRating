<?php 
    Route::get('/', 'MovieController@index')->name('movies');

    Route::get('/new/movie', 'MovieController@create')->name('new_movie');
    Route::post('/movies', 'MovieController@store');
    
    Route::get('/movies/show/{movie}', 'MovieController@show');
    
    Route::get('/movies/edit/{movie}', 'MovieController@edit');
    Route::post('/movies/update/{movie}', 'MovieController@update');
    
    Route::get('/movies/delete/{movie}', 'MovieController@destroy')->name('delete_movie');

    Route::post('/movies/rate/{movie}', 'MovieController@rate')->name('rate');