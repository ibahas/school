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

// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//     المحفظين ... Users والأدمن والأباء  ..... .... .......
Route::group(['prefix' => 'users', 'middleware' => 'auth', 'namespace' => 'user'], function () {
    Route::get('/', 'UsersController@index');
    Route::get('/teacher', 'UsersController@showAllTeacher');
    Route::get('/show', 'UsersController@show');
    Route::get('/create', 'UsersController@create')->name('createUser');
    Route::post('/store', 'UsersController@store')->name('storeUser');
    Route::post('/updatePassword/{id}', 'UsersController@updatePassword')->name('updatePassword');
    Route::put('/updatephoto/{id}', 'UsersController@updatePhoto')->name('updatephoto');
    Route::put('/userupdate', 'UsersController@updateInfoUser')->name('userupdate');
    Route::post('/destroy/{id}', 'UsersController@destroy')->name('destroyUser');
    Route::get('/parents', 'UsersController@showAllParents')->name('showAllParents');
});

// طلابي ... teacherstudents
Route::get('teacherstudents', 'TeacherstudentsController@index');

// الطلاب ... students
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/students', 'StudentsController');
});

// البرامج ... programs
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/programs', 'ProgramsController');
});

// أيام عمل البرنامج  ... dateworkprograms
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/dateworkprograms', 'DateworkprogramsController');
    Route::get('/dateworkprograms/{idProgram}/{idStudent}', 'DateworkprogramsController@programWithStudent')->name('programWithStudent');
    Route::get('/dateworkprograms/create/{id}', 'DateworkprogramsController@create')->name('createDateWorkProgram');
    Route::post('dateworkprograms/updateAll','DateworkprogramsController@updateAll');
});

// حضور الموظفين ... stafftime
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/stafftime', 'StafftimeController');
});
// الحضور السنة كلها... presencestudents
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/presencestudents', 'PresencestudentsController');
    Route::get('/presencestudents/create/{id}', 'PresencestudentsController@create')->name('createPS');
});

//    حضور المحفظين الدورات ... presenceusers
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/presenceusers', 'PresenceusersController');
});

//    الدورات ... courses
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/courses', 'CoursesController');
});

//    طلاب الدورات ... coursestudents
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/coursestudents', 'CoursestudentsController');
});

//    حضور الدورات ... presencecourses
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/presencecourses', 'PresencecoursesController');
});

//    إختبار الدورات ... coursetesting
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/coursetesting', 'CoursetestingController');
});

//   بلاغات الطالب للأب ... studentsParents ...... reportStudents تحديث للViews.
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/reportStudents', 'StudentsParentsController');
    Route::get('/reportStudents/create/{id}', 'StudentsParentsController@create')->name('createReport');
});

    /*
    المحفظين ... Users والأدمن والأباء  ..... .... .......
    الطلاب ... students
    البرامج ... programs
    أيام عمل البرنامج  ... dateworkprograms
    الحضور السنة كلها... presencestudents
    حضور المحفظين الدورات ... presenceusers
    الدورات ... courses
    طلاب الدورات ... coursestudents
    حضور الدورات ... presencecourses
    دوام الموظفين ... stafftime
    إختبار الدورات ... coursetestings
    عرض بدء وانتهاء الطالب من برنامج معين ... log_students
    بلاغات الطالب للأب ... studentsParents 

    */
