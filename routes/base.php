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
Route::group(['middleware' => 'auth'], function () {

    //Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    //Edit Profile
    Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('/profile/edit', 'ProfileController@update')->name('profile.edit');

    //Clients
    Route::get('clients/datatable', 'ClientsController@datatable')->name('clients.datatable');
    Route::resource('clients', 'ClientsController');

    //Contacts
    Route::get('contacts/datatable', 'ContactsController@datatable')->name('contacts.datatable');
    Route::get('contacts', 'ContactsController@index')->name('contacts.index');

    //Projects
    Route::get('projects/datatable', 'ProjectsController@datatable')->name('projects.datatable');
    Route::resource('projects', 'ProjectsController')->except(['show']);

    //Tickets
    Route::get('tickets/datatable', 'TicketsController@datatable')->name('tickets.datatable');
    Route::resource('tickets', 'TicketsController');

    //Client
    Route::group(['prefix' => 'client/{client}', 'as' => 'client.', 'namespace' => 'Client'], function () {

        //Summary
        Route::get('summary', 'SummaryController@index')->name('summary');

        //Contacts
        Route::get('contacts/datatable', 'ContactsController@datatable')->name('contacts.datatable');
        Route::get('contacts', 'ContactsController@index')->name('contacts.index');

        //Tickets
        Route::get('tickets/datatable', 'TicketsController@datatable')->name('tickets.datatable');
        Route::get('tickets', 'TicketsController@index')->name('tickets.index');

        //Projects
        Route::get('projects/datatable', 'ProjectsController@datatable')->name('projects.datatable');
        Route::get('projects', 'ProjectsController@index')->name('projects.index');

        //Files
        Route::get('files/datatable', 'FilesController@datatable')->name('files.datatable');
        Route::get('files', 'FilesController@index')->name('files.index');

        //Notes
        Route::get('notes/datatable', 'NotesController@datatable')->name('notes.datatable');
        Route::get('notes', 'NotesController@index')->name('notes.index');

        //Taskstasks
        Route::get('tasks/datatable', 'TasksController@datatable')->name('tasks.datatable');
        Route::get('tasks', 'TasksController@index')->name('tasks.index');


    });

    //Project
    Route::group(['prefix' => 'project/{project}', 'as' => 'project.', 'namespace' => 'Project'], function () {

        //Summary
        Route::get('summary', 'SummaryController@index')->name('summary');

        //Tickets
        Route::get('tickets/datatable', 'TicketsController@datatable')->name('tickets.datatable');
        Route::get('tickets', 'TicketsController@index')->name('tickets.index');

        //Documents
        Route::get('files/datatable', 'FilesController@datatable')->name('files.datatable');
        Route::get('files', 'FilesController@index')->name('files.index');

        //Notes
        Route::get('notes/datatable', 'NotesController@datatable')->name('notes.datatable');
        Route::resource('notes', 'NotesController')->only(['index', 'destroy']);

        //Tasks
        Route::get('tasks/datatable', 'TasksController@datatable')->name('tasks.datatable');
        Route::get('tasks', 'TasksController@index')->name('tasks.index');

    });

    //Settings
    Route::group(['prefix' => 'settings', 'as' => 'settings.', 'namespace' => 'Settings'], function () {

        //General
        Route::get('general', 'GeneralController@edit')->name('general');
        Route::post('general', 'GeneralController@update')->name('general');

        //Company
        Route::get('company', 'CompanyController@edit')->name('company');
        Route::post('company', 'CompanyController@update')->name('company');

        //Users
        Route::resource('users', 'UsersController');

        //Roles
        Route::resource('roles', 'RolesController');

        //Email Templates
        Route::resource('email-templates', 'EmailTemplatesController');

    });

});
