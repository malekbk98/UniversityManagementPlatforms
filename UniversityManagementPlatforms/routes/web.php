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
Route::resource ('/teachers','TeacherController');
Route::get ('/students_review','StudentController@reviews')->name('students_review.reviews');
Route::resource ('/students','StudentController');
Route::get ('/subjects_review','SubjectController@reviews')->name('subjects_review.reviews');
Route::get ('/students_lists','StudentController@lists')->name('students_lists.lists');

Route::get('/departments_index', 'DepartmentController@index')->name('departments_index.index');
Route::get('/departments_show', 'DepartmentController@show')->name('departments_show.show');
Route::get('/departments_edit', 'DepartmentController@edit')->name('departments_edit.edit');
Route::get('/departments_create', 'DepartmentController@create')->name('departments_create.create');
Route::resource ('/departments','DepartmentController');

Route::post ('/store_report','NotifController@store')->name('notif.report');
