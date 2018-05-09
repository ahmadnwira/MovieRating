<?php
    Route::get('/profile', 'UserController@profile')->name('profile');

    Route::get('/login', 'UserController@login')->name('login');
    Route::post('/login', 'UserController@signin');
    
    Route::get('/register', 'UserController@register')->name('register');
    Route::post('/register', 'UserController@store');
    
    Route::get('/logout', 'UserController@logout')->name('logout');
    
    Route::get('users/delte', 'UserController@destroy');
    
    Route::get('users/edit/{user}', 'UserController@edit');
    Route::post('users/update/{user}', 'UserController@update');