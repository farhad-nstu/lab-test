<?php

Route::group(['prefix' => 'admin', 'namespace' => 'admin','middleware'=>'role'], function () {

    //admin dashboard route
    Route::get('dashboard', 'DashboardController@dashboard')->name('admin.dashboard');
    Route::resource('/users',UserController::class);

    //Profile
    Route::get('/profile-edit', 'UserController@edit_profile')->name('admin.profile_edit');
    Route::post('/profile-update', 'UserController@update_profile')->name('admin.profile_update');

    Route::resource('urlShorten', UrlShortenController::class);
    Route::post('/report/date-wise', 'ReportController@get_datewise_report')->name('report.datewise.find');

    /// Report Routes
    Route::get('/report/date-wise/page', 'ReportController@get_datewise_report_page')->name('report.datewise');
    Route::get('/report/date-wise', 'ReportController@get_datewise_report')->name('report.datewise.find');
    Route::post('/report/file-export', 'ReportController@export_file')->name('report.export_file');
 });

