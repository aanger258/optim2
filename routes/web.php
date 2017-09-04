<?php

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
Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function () {
	    
	    Route::get('/home', 'HomeController@index')->name('Dashboard');

	    #User-Groups
	    Route::get('/user-groups','UserGroupsController@index')->name('Grupuri de utilizatori');
	    Route::get('/user-groups/create','UserGroupsController@create')->name('Grupuri de utilizatori');
	    Route::post('/user-groups','UserGroupsController@store')->name('Grupuri de utilizatori');
	    Route::get('/user-groups/{id}/edit','UserGroupsController@edit')->name('Grupuri de utilizatori');
	    Route::put('/user-groups/{id}','UserGroupsController@update')->name('Grupuri de utilizatori');
	    Route::delete('/user-groups/{id}','UserGroupsController@destroy')->name('Grupuri de utilizatori');
	    Route::post('/refresh-roles','UserGroupsController@refreshRoles')->name('Grupuri de utilizatori');

	    #Users
	    Route::get('/accounts','AccountManagerController@index')->name('Manager de conturi');
	    Route::get('/accounts/create','AccountManagerController@create')->name('Manager de conturi');
	    Route::post('/accounts','AccountManagerController@store')->name('Manager de conturi');
	    Route::get('/accounts/{id}/edit','AccountManagerController@edit')->name('Manager de conturi');
	    Route::put('/accounts/{id}','AccountManagerController@update')->name('Manager de conturi');
	    Route::delete('/accounts/{id}','AccountManagerController@destroy')->name('Manager de conturi');
});

#General access
Route::get('admin/login', function() {
   		return view('login');
});
Route::post('admin/login' , 'LoginController@login');
Route::post('admin/logout', 'LoginController@logout');
Route::get('/admin/permission-denied', function () {
	return view('permission-denied');
});