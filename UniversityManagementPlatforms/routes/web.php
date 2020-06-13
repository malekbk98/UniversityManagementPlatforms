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

<<<<<<< HEAD
Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource ('/student_attendance', 'StudentAttendanceController');
=======
Route::get('/home', 'HomeController@index')->name('home');
<<<<<<< HEAD
>>>>>>> ea786da938f6c87da5fa06c10e58ac638b4b0190
=======
>>>>>>> ea786da938f6c87da5fa06c10e58ac638b4b0190


    /************************************ Admin Routes ****************************************/
    //Teacher rootes
    Route::get ('/teachers_review','TeacherController@reviews')->name('teachers_review.reviews');
    Route::get ('/teachers_lists','TeacherController@lists')->name('teachers_lists.lists');
    Route::resource ('/teachers','TeacherController');

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> ea786da938f6c87da5fa06c10e58ac638b4b0190
//Teacher routes
Route::get ('/teachers_review','TeacherController@reviews')->name('teachers_review.reviews');
Route::get ('/teachers_lists','TeacherController@lists')->name('teachers_lists.lists');
Route::resource ('/teachers','TeacherController');
<<<<<<< HEAD
>>>>>>> ea786da938f6c87da5fa06c10e58ac638b4b0190

    //Student rootes
    Route::get ('/students_review','StudentController@reviews')->name('students_review.reviews');
    Route::get ('/students_lists','StudentController@lists')->name('students_lists.lists');
    Route::resource ('/students','StudentController');

<<<<<<< HEAD
    //Subject rootes
    Route::get ('/subjects_review','SubjectController@reviews')->name('subjects_review.reviews');
    Route::resource ('/subjects','SubjectController');

=======
=======


>>>>>>> ea786da938f6c87da5fa06c10e58ac638b4b0190
//Student routes
Route::get ('/students_review','StudentController@reviews')->name('students_review.reviews');
Route::get ('/students_lists','StudentController@lists')->name('students_lists.lists');
Route::resource ('/students','StudentController');

//Subject routes
Route::get ('/subjects_review','SubjectController@reviews')->name('subjects_review.reviews');
Route::resource ('/subjects','SubjectController');
<<<<<<< HEAD
>>>>>>> ea786da938f6c87da5fa06c10e58ac638b4b0190

    //Dep rootes
    Route::get('/departments_index', 'DepartmentController@index')->name('departments_index.index');
    Route::get('/departments_show', 'DepartmentController@show')->name('departments_show.show');
    Route::get('/departments_edit', 'DepartmentController@edit')->name('departments_edit.edit');
    Route::get('/departments_create', 'DepartmentController@create')->name('departments_create.create');
    Route::resource ('/departments','DepartmentController');

<<<<<<< HEAD
    //Notif rootes
    Route::post ('/store_report','NotifController@store')->name('notif.report');
    Route::post ('/notif_grp','NotifController@notif_group')->name('notif_grp.notif_group');
    /************************************ End Admin Routes **************************************/
=======
=======


>>>>>>> ea786da938f6c87da5fa06c10e58ac638b4b0190
//Dep routes
Route::get('/departments_index', 'DepartmentController@index')->name('departments_index.index');
Route::get('/departments_show', 'DepartmentController@show')->name('departments_show.show');
Route::get('/departments_edit', 'DepartmentController@edit')->name('departments_edit.edit');
Route::get('/departments_create', 'DepartmentController@create')->name('departments_create.create');
Route::resource ('/departments','DepartmentController');

//Classe routes
Route::get('/classes_index', 'ClasseController@index')->name('classes_index.index');
Route::get('/classes_show', 'ClasseController@show')->name('classes_show.show');
Route::get('/classes_edit', 'ClasseController@edit')->name('classes_edit.edit');
Route::get('/classes_create', 'ClasseController@create')->name('classes_create.create');
Route::resource ('/classes','ClasseController');

//Posts routes
Route::get('/posts_index', 'NotifController@index')->name('posts_index.index');
Route::get('/posts_show', 'NotifController@show')->name('posts_show.show');
Route::get('/posts_edit', 'NotifController@edit')->name('posts_edit.edit');
Route::get('/posts_create', 'NotifController@create')->name('posts_create.create');
Route::post('/posts_create','NotifController@post')->name('posts.post');
Route::resource ('/posts','NotifController');

//Schedule routes
Route::get('/schedule_index', 'LessonController@home')->name('schedule_index.home');
Route::get('/schedule_edit', 'LessonController@edit')->name('schedule_edit.edit');
Route::get('/schedule_create', 'LessonController@create')->name('schedule_create.create');
Route::resource ('/schedules', 'LessonController');

//Notif routes
Route::post ('/store_report','NotifController@store')->name('notif.report');
Route::post ('/notif_grp','NotifController@notif_group')->name('notif_grp.notif_group');;

/************************************ End Admin Routes **************************************/
/************************************ Teacher Routes ****************************************/
Route::resource ('/student_attendance', 'StudentAttendanceController');
Route::resource ('/schedule', 'LessonController');
Route::get ('/class', 'ClasseController@teacherclasselist')->name('classelist');
Route::get ('/classe/{classid}', 'ClasseController@showstudentclasse')->name('studentclasslist');

Route::resource ('/teacher_attendance', 'TeacherAttendanceController');
Route::post('/class_attendance','StudentAttendanceController@addattendance')->name('class_attendance');
/************************************ End Teacher Routes **************************************/

/**************************************** Students Reviews ********************* */
Route::middleware('auth')->group(function () {
// add subject review******
Route::resource('/reviewSubjectt','SubjectController');
Route::post('/review_Subject','SubjectController@add_subject_review')->name('review_Subject.add_subject_review');
//*********

// add Teacher review******
Route::resource('/reviewTeacher','TeacherController');
Route::post('/review_Teacher','TeacherController@add_Teacher_review')->name('review_Teacher.add_Teacher_review');
//*********         End Students Reviews *************** /
 
<<<<<<< HEAD
>>>>>>> ea786da938f6c87da5fa06c10e58ac638b4b0190
=======
>>>>>>> ea786da938f6c87da5fa06c10e58ac638b4b0190
});