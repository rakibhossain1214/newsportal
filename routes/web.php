<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');
Route::get('/listing', 'ListingPageController@index');
Route::get('/details', 'DetailsPageController@index');

// Route::get('/hello', function(){
//     return view('admin.dashboard');
// });

Route::group(['prefix'=>'back', 'middleware'=>'auth'], function(){
    Route::get('/', 'Admin\DashboardController@index');
    Route::get('/category', 'Admin\CategoryController@index');
    Route::get('/category/create', 'Admin\CategoryController@create');
    Route::get('/category/edit', 'Admin\CategoryController@edit');
    Route::get('/permission', 'Admin\PermissionController@index');
    Route::get('/permission/create', 'Admin\PermissionController@create');
    Route::post('/permission/store', 'Admin\PermissionController@store');
    Route::get('/permission/edit/{id}', ['uses'=>'Admin\PermissionController@edit', 'as'=>'permission-edit']);
    Route::put('/permission/edit/{id}', ['uses'=>'Admin\PermissionController@update', 'as'=>'permission-update']);
    Route::delete('/permission/delete/{id}', ['uses'=>'Admin\PermissionController@destroy', 'as'=>'permission-delete']);

    Route::get('/roles', 'Admin\RoleController@index');
    Route::get('/roles/create', 'Admin\RoleController@create');
    Route::post('/roles/store', 'Admin\RoleController@store');
    Route::get('/roles/edit/{id}', ['uses'=>'Admin\RoleController@edit', 'as'=>'role-edit']);
    Route::put('/roles/edit/{id}', ['uses'=>'Admin\RoleController@update', 'as'=>'role-update']);
    Route::delete('/roles/delete/{id}', ['uses'=>'Admin\RoleController@destroy', 'as'=>'role-delete']);
});

Route::get('/query', 'DbController@index');
Route::get('/model', 'DbController@model');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
