<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// Auth::routes();
Route::get('/help', function(){
    return view('help');
})->name('help');


Route::namespace('Auth')->group(function () {
    Route::get('/login', 'LoginController@showLoginForm')->middleware('guest')->name('login');
    Route::post('/login', 'LoginController@login')->middleware('guest');
    Route::post('/logout', 'LoginController@logout')->name('logout');
});


Route::middleware('auth')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/getStaffPosition', 'HomeController@getStaffPosition');
    Route::get('/home/getStaffDepartement', 'HomeController@getStaffDepartement');

    //personal karyawan
    Route::get('/users/account/{id}/edit', 'UsersController@editAccount')->name('users.account.edit');
    Route::patch('/users/{id}/updateAccount', 'UsersController@updateAccount')->name('users.account.update');
    // profile
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/profile/{id}/edit', 'ProfileController@editProfile')->name('profile.edit');
    Route::patch('/profile/{id}/update', 'ProfileController@updateProfile')->name('profile.update');
    Route::patch('/profile/upload', 'ProfileController@uploadPhoto')->name('profile.upload');

    Route::middleware('role:admin|superadmin')->group(function(){
        Route::get('/users', 'UsersController@index')->name('users.index');
        Route::patch('/users/{id}/update', 'UsersController@update')->name('users.update');
        Route::get('/users/{id}', 'UsersController@destroy')->name('users.destroy');

        Route::get('/roles', 'RolesController@index')->name('roles.index');
        Route::get('/roles/create', 'RolesController@create')->name('roles.create');
        Route::post('/roles', 'RolesController@store')->name('roles.store');
        Route::get('/roles/{roles}/edit', 'RolesController@edit')->name('roles.edit');
        Route::patch('/roles/{roles}/update', 'RolesController@update')->name('roles.update');
        Route::get('/roles/{id}', 'RolesController@destroy')->name('roles.destroy');
    });
});

    Route::middleware('role:admin|accounting|supervisor')->group(function(){
        Route::namespace('Master')->prefix('master')->name('master.')->group(function(){
            Route::get('position', 'PositionController@index')->name('position.index');
            Route::middleware('role:admin|accounting')->group(function(){
                Route::get('position/create', 'PositionController@create')->name('position.create');
                Route::post('position', 'PositionController@store')->name('position.store');
                Route::get('position/{position}/edit', 'PositionController@edit')->name('position.edit');
                Route::patch('position/{position}/update', 'PositionController@update')->name('position.update');
                Route::get('position/{id}', 'PositionController@destroy')->name('position.destroy');
            });

            Route::get('departement', 'DepartementController@index')->name('departement.index');
            Route::get('staff', 'StaffController@index')->name('staff.index');
            Route::middleware('role:admin|accounting')->group(function(){
                Route::get('departement/create', 'DepartementController@create')->name('departement.create');
                Route::post('departement', 'DepartementController@store')->name('departement.store');
                Route::get('departement/{departement}/edit', 'DepartementController@edit')->name('departement.edit');
                Route::patch('departement/{departement}/update', 'DepartementController@update')->name('departement.update');
                Route::get('departement/{id}', 'DepartementController@destroy')->name('departement.destroy');

                Route::get('staff/create', 'StaffController@create')->name('staff.create');
                Route::post('staff', 'StaffController@store')->name('staff.store');
                Route::get('staff/{staff}/edit', 'StaffController@edit')->name('staff.edit');
                Route::patch('staff/{staff}/update', 'StaffController@update')->name('staff.update');
                Route::get('staff/{id}', 'StaffController@destroy')->name('staff.destroy');
            });
        });

    });


