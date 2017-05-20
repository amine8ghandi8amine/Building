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



Route::resource('/', 'HomeController');

Route::get('/getJSON/{id}', 'BuildingController@getJSON')->name('getJSON'); 

Route::get('/contact-us', 'ContactController@form')->name('contactUs'); 

Auth::routes();

Route::get('/all', 'BuildingController@showingAllEnabled')->name('showingAllEnabled');

Route::get('/buildings/add', [ 'as' => 'buildings.add', 'uses' => 'BuildingController@add' ]);

Route::get('/home', 'BuildingController@showingAllEnabled')->name('home');

Route::any('/search', 'BuildingController@search')->name('search');

Route::resource('/forRent', 'ForRent');

Route::resource('/forType', 'ForType');

Route::group(['middleware' => ['user']], function () {

	Route::get('/user-page/{id}', 'UserController@myPage')->name('user.my-page');

	Route::get('/user-settings/{id}', 'UserController@mySettings')->name('user.my-settings');

	Route::get('/user-buildings/{id}', 'UserController@myBuildings')->name('user.my-buildings');

	Route::get('/user-buildings-in-wait/{id}', 'UserController@myBuildingsW')->name('user.my-buildings-in-wait');

	Route::get('/user-update-buildings-in-wait/{id}', 'UserController@buildingsEdit')->name('user.update-buildings-in-wait');

	Route::patch('/user-update-settings/{id}', 'UserController@update')->name('user.updateSettings');

});

Route::group(['middleware' => ['admin']], function () {

    Route::resource('/admin-panel', 'AdminController');

    Route::get('/admin-users-panel/data', ['as' => 'admin-users-panel.data', 'uses' => 'UserControlledByAdminController@anyData']);

    Route::resource('/admin-users-panel', 'UserControlledByAdminController');

    Route::resource('/site-settings', 'SiteSettingController');

    Route::get('/buildings/data', [ 'as' => 'buildings.data', 'uses' => 'BuildingController@anyData' ]);

	Route::resource('/buildings', 'BuildingController');

	Route::get('/contact-box', [ 'as' => 'contact.box', 'uses' => 'ContactController@contactBox' ]);

	Route::get('/contact-box/{id}', [ 'as' => 'contact.box.show', 'uses' => 'ContactController@contactBoxShow' ]);

	Route::get('/contact-sent/', [ 'as' => 'contact.sent', 'uses' => 'ReplyController@sent' ]);

	Route::get('/contact-draft/', [ 'as' => 'contact.draft', 'uses' => 'ReplyController@draft' ]);

	Route::get('/contact-trash/', [ 'as' => 'contact.trash', 'uses' => 'ReplyController@trash' ]);

	Route::get('/contact/{id}/response', [ 'as' => 'contact.response', 'uses' => 'ReplyController@create' ]);

	Route::get('/contact/data', [ 'as' => 'contact.data', 'uses' => 'ContactController@anyData' ]);

	Route::resource('/reply', 'ReplyController');

	Route::resource('/contact', 'ContactController');

});




    


