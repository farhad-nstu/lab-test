<?php

Route::group(['namespace' => 'front'], function () {

    Route::get('/','FrontController@index')->name('front.index');

    Route::group(['middleware' => 'auth'], function() {
    	Route::get('hit-check/{link}','FrontController@hit_link');
    	Route::get('get-qrcode/{link}','FrontController@get_qrcode');
    });
});

