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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource ('/student_attendance', 'StudentAttendanceController');


//Admin Routes

Route::get ('/teachers_review','TeacherController@reviews')->name('teachers_review.reviews');
Route::get ('/students_review','StudentController@reviews')->name('students_review.reviews');


Route::post ('/store_report','NotifController@store')->name('notif.report');

Route::resource ('/teachers','TeacherController');
Route::get ('/students','StudentController@reviews')->name('students.reviews');
Route::get ('/subjects','SubjectController@reviews')->name('subjects.reviews');

