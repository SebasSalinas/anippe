<?php
/**
 * Project: anippe
 * File: admin.php
 * Author: Luka
 * Date: 26.12.2020
 * Time: 10:06
 */

//Auth
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth:admin'], function () {

    //Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    //Organisations
    Route::get('organisations/datatable', 'OrganisationsController@datatable')->name('organisations.datatable');
    Route::resource('organisations', 'OrganisationsController')->only(['index', 'destroy', 'show']);

    //Edit Profile
    Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('/profile/edit', 'ProfileController@update')->name('profile.edit');

});
