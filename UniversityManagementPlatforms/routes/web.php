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


/************************************ Admin Routes ****************************************/

//Teacher rootes
Route::get ('/teachers_review','TeacherController@reviews')->name('teachers_review.reviews');
Route::get ('/teachers_lists','TeacherController@lists')->name('teachers_lists.lists');
Route::resource ('/teachers','TeacherController');


//Student rootes
Route::get ('/students_review','StudentController@reviews')->name('students_review.reviews');
Route::get ('/students_lists','StudentController@lists')->name('students_lists.lists');
Route::resource ('/students','StudentController');

//Subject rootes
Route::get ('/subjects_review','SubjectController@reviews')->name('subjects_review.reviews');
Route::resource ('/subjects','SubjectController');


//Dep rootes
Route::get('/departments_index', 'DepartmentController@index')->name('departments_index.index');
Route::get('/departments_show', 'DepartmentController@show')->name('departments_show.show');
Route::get('/departments_edit', 'DepartmentController@edit')->name('departments_edit.edit');
Route::get('/departments_create', 'DepartmentController@create')->name('departments_create.create');
Route::resource ('/departments','DepartmentController');

//Classe rootes
Route::get('/classes_index', 'ClasseController@index')->name('classes_index.index');
Route::get('/classes_show', 'ClasseController@show')->name('classes_show.show');
Route::get('/classes_edit', 'ClasseController@edit')->name('classes_edit.edit');
Route::get('/classes_create', 'ClasseController@create')->name('classes_create.create');
Route::resource ('/classes','ClasseController');

//Notif rootes
Route::post ('/store_report','NotifController@store')->name('notif.report');
Route::post ('/notif_grp','NotifController@notif_group')->name('notif_grp.notif_group');;

/************************************ End Admin Routes **************************************/
