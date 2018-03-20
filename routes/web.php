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


/*For Api Testing */
Route::get('/demo', 'HomeController@index')->name('demo');
Route::get('/app', 'AppInstancesController@index')->name('app');
Route::get('/student', 'StudentsController@index')->name('student');
Route::get('/more', 'HomeController@showStudentTests')->name('more');

/*AppInstances */
Route::post('/api/app/register', 'AppInstancesController@registerApp');

/* Students  */
Route::post('/api/student/create', 'StudentsController@createStudent');
Route::post('/api/student/update/{app_instance?}', 'StudentsController@updateStudent');
Route::get('/api/student/details/{app_instance?}', 'StudentsController@getStudent');
Route::get('/api/student/delete/{app_instance?}', 'StudentsController@deleteStudent');
Route::post('/api/student/login/{app_instance?}', 'StudentsController@login');


/* Posts  */
Route::post('/api/post/create', 'PostController@saveNewPost');
Route::post('/api/post/update', 'PostController@updatePost');
Route::get('/api/post/all/read/{user_id?}/{pagination?}/', 'PostController@getPostsChunk');
Route::post('/api/post/one/details/{post_id?}', 'PostController@getPostDetails');
Route::get('/api/post/delete/{post_id?}', 'PostController@deletePost');
