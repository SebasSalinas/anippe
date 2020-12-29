<?php


//Auth
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Reset Password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


//Logged in routes
Route::group(['middleware' => 'auth:portal'], function () {

    //Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    //Knowledge base
    Route::get('/knowledge-base', 'KnowledgeBaseController@index')->name('knowledge-base.index');
    Route::get('/knowledge-base/category/{category}', 'KnowledgeBaseController@showCategory')->name('knowledge-base.category');
    Route::get('/knowledge-base/article/{article}', 'KnowledgeBaseController@showArticle')->name('knowledge-base.article');

    //Edit Profile
    Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('/profile/edit', 'ProfileController@update')->name('profile.edit');

});
