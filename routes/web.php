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

Route::get('/', 'FrontPageController@index')->name('frontPage.index');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@doLogin')->name('doLogin');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::get('/students/{id}', 'FontPageStudentController@index')
    ->name('FontPageStudentController.index')
    ->middleware('student');

Route::get('getFolderName', 'RecognizeController@getFolderName')->name(
    'getFolderName'
);

Route::get('getFileName/{folderName}', 'RecognizeController@getFileName')->name(
    'getFileName'
);

// This method must use POST Request. Update Later. I have no time to do the POST Request @@
Route::get('checkAttendance/{id}', 'RecognizeController@checkAttendance')->name(
    'checkAttendance'
);

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::resource('students', 'StudentController');
    Route::get('images/{id}', 'ImageController@index')->name('images.index');
    Route::post('images/upload/store', 'ImageController@fileStore')->name(
        'images.fileStore'
    );
    Route::post('images/delete', 'ImageController@fileDestroy')->name(
        'images.fileDestroy'
    );
    Route::get(
        'images/removeSingleImage/{id}',
        'ImageController@removeImage'
    )->name('images.removeImage');
    Route::resource('majors', 'MajorController');
    Route::resource('attendances', 'AttendanceController');
    Route::get('mail', 'EmailController@index')->name('mail.index');
    Route::post('mail', 'EmailController@sendEmail')->name('mail.sendEmail');
});
