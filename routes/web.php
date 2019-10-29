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

Route::get('/', function () {
    return view('template.layout');
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('students', 'StudentController');
    Route::get('images/{id}', 'ImageController@index')->name('images.index');
    Route::post('images/upload/store', 'ImageController@fileStore')->name('images.fileStore');
    Route::post('images/delete', 'ImageController@fileDestroy')->name('images.fileDestroy');
    Route::get('images/removeSingleImage/{id}', 'ImageController@removeImage')->name('images.removeImage');
});