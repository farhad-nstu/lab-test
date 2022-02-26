<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/user/logout','Auth\admin\LoginController@logout_user')->name('user.logout');



//Clears Cache facade value:
Route::get('/cc', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Cashe</h1>';
});

//admin route
require('admin/admin.php');

//front route
require('front/front.php');



// Admin Auth
Route::group(['prefix' => 'system', 'namespace' => 'Auth'], function () {
    Route::get('/register','admin\RegisterController@show_register_form')->name('system.register');
    Route::get('/login','admin\LoginController@show_login_form')->name('system.login');
    Route::post('/login/admin','admin\LoginController@login')->name('system.login.store');
});

// Forgot password route
Route::post('/email-match','Auth\ForgotPasswordController@match_email')->name('email-match');
Route::post('/change-password','Auth\ForgotPasswordController@change_password')->name('change-password');


Route::fallback(function () {
    $data = [];
    return response()->view('errors.404', $data, 404);
});
