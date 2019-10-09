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
    Route::get('/', function() {
        return view('dashboard.index');
    });
    Route::get('/students', function() {
        return view('student.index');
    });
    Route::get('/students/add', function() {
        return view('student.add');
    });
    Route::get('/students/detail', function() {
        return view('student.show');
    });
});