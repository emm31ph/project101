<?php

use Illuminate\Http\Request;
 
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['json.response']], function () {

	Route::post('login', 'PassportController@login');
	Route::post('register', 'PassportController@register');

	Route::middleware('auth:api')->group(function () {
	    Route::get('user', 'PassportController@details');

	    // Route::resource('products', 'ProductController');
	});

// private routes
    Route::middleware('auth:api')->group(function () {
        Route::get('/logout', 'PassportController@logout')->name('logout');
    });
});

