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

Route::get('/', 'HomeController@welcome');


Auth::routes();

/********************UserController*************/
Route::get('/admin/users/{id}/delete','Admin\AdminController@destroy');
Route::get('/admin/users/{id}/links','Admin\AdminController@links');
Route::post('/admin/users/{id}/links','Admin\AdminController@postLinks');
Route::resource('/admin/users', 'Admin\AdminController');
/********************DoctorController****************/
Route::get('/admin/doctors/{id}/delete','Admin\DoctorController@destroy');
Route::resource('/admin/doctors', 'Admin\DoctorController');
/********************PateintController****************/
Route::get('/admin/patients/{id}/delete','Admin\PatientController@destroy');
Route::resource('/admin/patients', 'Admin\PatientController');
/********************SliderController*************/
Route::get('/admin/slider/{id}/delete','Admin\SliderController@destroy');
Route::resource('/admin/slider', 'Admin\SliderController');
/********************SpecialtyController*************/
Route::resource('/admin/specialty','Admin\SpecialtyController');
Route::get('/admin/specialty/{id}/delete','Admin\SpecialtyController@destroy');

/********************PostController*************/
Route::get('/admin/post/{id}/comments','Admin\ArticleController@comments');
Route::get('/admin/post/{id}/addComment','Admin\ArticleController@addComment');
Route::post('/admin/post/{id}/addComment','Admin\ArticleController@postAddComment');
Route::get('/admin/post/{id}/delete','Admin\ArticleController@destroy');
Route::get('/admin/comment/{id}/delete','Admin\ArticleController@delete');

Route::resource('/admin/post','Admin\ArticleController');


/********************QusetionControllerforAdmin*************/
Route::get('/admin/question/{id}/answer','Admin\ManageQuestionController@answers');
Route::get('/admin/question/{id}/delete','Admin\ManageQuestionController@destroy');
Route::get('/admin/answer/{id}/delete','Admin\ManageQuestionController@delete');
Route::get('/admin/question/{id}/addAnswer','Admin\ManageQuestionController@addAnswer');
Route::post('/admin/question/{id}/addAnswer','Admin\ManageQuestionController@postAddAnswer');

Route::resource('/admin/question','Admin\ManageQuestionController');
Route::get('/admin/menu/{id}/delete','Admin\MenuController@destroy');
Route::resource('/admin/menu', 'Admin\MenuController');
/*
Route::get('/answer/{id}/update','QuestionController@editAnswer');
Route::post('/asnwer/{id}/update','QuestionController@updateAnswer');*/

/********************MenuController*************/


Route::get('/register/doctor','Auth\RegisterController@doctorRegister')->name('doctor-register');
Route::post('/register/doctor','Auth\RegisterController@postDoctorRegister')->name('post-doctor-register');

Route::get('/MyDoctor/departments', 'HomeController@departments');
Route::get('/MyDoctor/doctors', 'HomeController@doctors');
Route::get('/MyDoctor/posts', 'HomeController@posts');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/{id}', 'HomeController@show')->name('post.show');

/*****************************Change Passwords*********************/
Route::get('/admin/home/changepassword','Admin\HomeController@changePassword')->name('get-admin-changepassword');
Route::post('/admin/home/changepassword','Admin\HomeController@postChangePassword')->name('post-admin-changepassword');
Route::get('/patient/home/changepassword','Patient\HomeController@changePassword')->name('get-patient-changepassword');
Route::post('/patient/home/changepassword','Patient\HomeController@postChangePassword')->name('post-patient-changepassword');
Route::get('/doctor/home/changepassword','Doctor\HomeController@changePassword')->name('get-doctor-changepassword');
Route::post('/doctor/home/changepassword','Doctor\HomeController@postChangePassword')->name('post-doctor-changepassword');


/***********************QuestionControllerForDoctor*************/
Route::get('/doctor/question/{id}/answer','Doctor\QuestoinController@answers');
Route::get('/doctor/question/{id}/addAnswer','Doctor\QuestoinController@addAnswer');
Route::post('/doctor/question/{id}/addAnswer','Doctor\QuestoinController@postAddAnswer');
Route::resource('/doctor/question', 'Doctor\QuestoinController');

Route::resource('/doctor/post', 'Doctor\PostController');
Route::get('/doctor/home', 'Doctor\HomeController@index')->name('doctor.home');

/***********************QuestionControllerForPatient*************/
Route::get('/patient/home', 'Patient\HomeController@index')->name('patient.home');
Route::post('/patient/comment/{id}/addComment', 'Patient\HomeController@postAddComment')->name('patient.comment');
Route::get('/patient/question/{id}/answer','Patient\MyQuestoinController@answers');
Route::resource('/patient/question', 'Patient\MyQuestoinController');