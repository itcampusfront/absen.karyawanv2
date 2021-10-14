<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin
Route::group(['middleware' => ['admin']], function(){
    // Logout
	Route::post('/admin/logout', 'LoginController@logout')->name('auth.logout');

	// Dashboard
	Route::get('/admin', 'DashboardController@index')->name('admin.dashboard');

	// User
	Route::get('/admin/user', 'UserController@index')->name('admin.user.index');
	Route::get('/admin/user/create', 'UserController@create')->name('admin.user.create');
	Route::post('/admin/user/store', 'UserController@store')->name('admin.user.store');
	Route::get('/admin/user/detail/{id}', 'UserController@detail')->name('admin.user.detail');
	Route::get('/admin/user/edit/{id}', 'UserController@edit')->name('admin.user.edit');
	Route::post('/admin/user/update', 'UserController@update')->name('admin.user.update');
	Route::post('/admin/user/delete', 'UserController@delete')->name('admin.user.delete');

	// Group
	Route::get('/admin/group', 'GroupController@index')->name('admin.group.index');
	Route::get('/admin/group/create', 'GroupController@create')->name('admin.group.create');
	Route::post('/admin/group/store', 'GroupController@store')->name('admin.group.store');
	Route::get('/admin/group/detail/{id}', 'GroupController@detail')->name('admin.group.detail');
	Route::get('/admin/group/edit/{id}', 'GroupController@edit')->name('admin.group.edit');
	Route::post('/admin/group/update', 'GroupController@update')->name('admin.group.update');
	Route::post('/admin/group/delete', 'GroupController@delete')->name('admin.group.delete');

	// Office
	Route::get('/admin/office', 'OfficeController@index')->name('admin.office.index');
	Route::get('/admin/office/create', 'OfficeController@create')->name('admin.office.create');
	Route::post('/admin/office/store', 'OfficeController@store')->name('admin.office.store');
	Route::get('/admin/office/detail/{id}', 'OfficeController@detail')->name('admin.office.detail');
	Route::get('/admin/office/edit/{id}', 'OfficeController@edit')->name('admin.office.edit');
	Route::post('/admin/office/update', 'OfficeController@update')->name('admin.office.update');
	Route::post('/admin/office/delete', 'OfficeController@delete')->name('admin.office.delete');

	// Position
	Route::get('/admin/position', 'PositionController@index')->name('admin.position.index');
	Route::get('/admin/position/create', 'PositionController@create')->name('admin.position.create');
	Route::post('/admin/position/store', 'PositionController@store')->name('admin.position.store');
	Route::get('/admin/position/detail/{id}', 'PositionController@detail')->name('admin.position.detail');
	Route::get('/admin/position/edit/{id}', 'PositionController@edit')->name('admin.position.edit');
	Route::post('/admin/position/update', 'PositionController@update')->name('admin.position.update');
	Route::post('/admin/position/delete', 'PositionController@delete')->name('admin.position.delete');
});

// Guest
Route::group(['middleware' => ['guest']], function(){
    // Home
    Route::get('/', function () {
        return redirect()->route('auth.login');
    });

    // Login
    Route::get('/login', 'LoginController@show')->name('auth.login');
    Route::post('/login', 'LoginController@authenticate')->name('auth.post-login');
});