<?php

// Route::any('{query}', function() { return redirect('/page-404'); })->where('query', '.*');

Route::group(['namespace' => 'front'], function () {

    // Error Page Routes
    Route::get('/404-page','ErrorController@page_404')->name('front.page_404');
    Route::get('/','FrontController@index')->name('front.index');

    Route::group(['middleware' => 'auth'], function() {
    	Route::get('hit-check/{link}','FrontController@hit_link');
        Route::get('/my-account','AccountController@my_account')->name('front.my-account');
        Route::post('/account/setting','AccountController@setting_account')->name('front.account.setting');

    });
});

