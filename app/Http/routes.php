<?php

Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'PostController@index');
    Route::get('post/{id}','PostController@showPost');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/{vue_capture?}', function () {
        return view('admin.index');
    });
});

Route::group(['prefix' => 'api', 'middleware' => 'api', 'namespace' => 'Api'], function () {
    Route::resource('post', 'PostController');
    Route::get('getUser', 'UserController@getUser');
});

Route::auth();
