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
    // الصفحة الرئيسية
    Route::get('/', 'UsersController@index');
    // عرض جميع المحفظين
    Route::get('/teacher', 'UsersController@showAllTeacher');
    // بيانات المستخدم
    Route::get('/show', 'UsersController@show');
    //إضافة مستخدم جديد
    Route::get('/create', 'UsersController@create')->name('createUser');
    //حفقط المستخدم
    Route::post('/store', 'UsersController@store')->name('storeUser');
    //تحديث كلمت المورو
    Route::post('/updatePassword/{id}', 'UsersController@updatePassword')->name('updatePassword');
    //تحديث الصورة
    Route::put('/updatephoto/{id}', 'UsersController@updatePhoto')->name('updatephoto');
    //تحديث المعلومات الشخصية
    Route::put('/userupdate', 'UsersController@updateInfoUser')->name('userupdate');
    //حذف مستخدم معين
    Route::post('/destroy/{id}', 'UsersController@destroy')->name('destroyUser');
    //جميع الأباء
    Route::get('/parents', 'UsersController@showAllParents')->name('showAllParents');
});

//للمحفظ
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
    //عرض جميع أيام عمل البرامج
    Route::resource('/dateworkprograms', 'DateworkprogramsController');
    //إضافة يوم عمل برنامج لجميع طلاب البرنامج
    Route::get('/dateworkprograms/create/{id}', 'DateworkprogramsController@create')->name('createDateWorkProgram');
    //عرض أيام عمل برنامج بواسطة الأي دي البرنامج والأيدي الطالب .
    Route::get('/dateworkprograms/{idProgram}/{idStudent}', 'DateworkprogramsController@programWithStudent')->name('programWithStudent');
    //تحديث جميع أيام عمل البرنامج 
    Route::post('/dateworkprograms/updateAll', 'DateworkprogramsController@updateAll');
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
    Route::get('/courses/showStudent/{idCourses}/{idStudent}', 'CoursesController@showDetailsStudentCourses');
});

//    طلاب الدورات ... coursestudents
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/coursestudents', 'CoursestudentsController');
    //إضافة الطلاب للدورات عن طريق الأي دي الدورة
    Route::get('/coursestudents/{id}/create', 'CoursestudentsController@create');
    //تحديث أيام الدورة
    Route::post('/coursestudents/updateall', 'CoursestudentsController@updateAllRows');
});

//    حضور الدورات ... presencecourses
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/presencecourses', 'PresencecoursesController');
    //إضافة  حضور أيام عمل الدورة
    Route::get('/presencecourses/{id}/create', 'PresencecoursesController@create');
    //عرض أيام عمل الدورة بواسطة الأي دي الدورة و أيدي الطالب
    Route::get('/presencecourses/showStudent/{idCourses}/{idStudent}', 'PresencecoursesController@showDetailsStudent');
    //تحديث أيام عمل الدورة
    Route::post('/presencecourses/updateStudent', 'PresencecoursesController@updateStudentPresence');
});

//    إختبار الدورات ... coursetesting
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/coursetesting', 'CoursetestingController');
    //إضافة درجة الإختبار
    Route::get('/coursetesting/create/{id}', 'CoursetestingController@create');
});

//   بلاغات الطالب للأب ... studentsParents ...... reportStudents تحديث للViews.
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/reportStudents', 'StudentsParentsController');
    //إضافة بلاغ  عن طريق الأيدي  الطالب ليظهر للأب وللمحفظ وللمدير
    Route::get('/reportStudents/create/{id}', 'StudentsParentsController@create')->name('createReport');
});

/**
 * parent
 * الأباء
 */

Route::group(['middleware' => 'auth'], function () {
    Route::get('/presencestudents/parent/{id}', 'PresencestudentsController@showPresentParentChildren');
    Route::get('/presenceprogram/parent/{id}','StudentsParentsController@childrenPresenceProgram');
    Route::get('/presencechildrencourse/parent/{id}','StudentsParentsController@presenceChildrenCourses');
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
