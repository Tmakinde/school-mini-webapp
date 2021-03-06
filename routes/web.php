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

Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/MySubject', 'HomeController@createUserSubject')->name('User-Subject');
Route::get('/Mycourses', 'HomeController@displayUserSubjects')->name('User-Courses');
Route::get('/result', 'HomeController@viewResult')->name('myresult');
Route::get('/download/result', 'HomeController@downloadResult')->name('download-result');

//parent
Route::get('/parent/login', 'Parent\LoginController@showLoginForm')->name('parent-login');
Route::post('/parent/login', 'Parent\LoginController@login')->name('parent.login');
Route::get('/parent/result', 'Parent\LoginController@downloadResult')->name('parent.result');
Route::get('/parent', 'Parent\ParentController@index')->name('parent.index');
Route::get('/parent/admission', 'Parent\ParentController@admission')->name('parent.admission');
Route::post('/parent/admission/process', 'Parent\ParentController@processAdmission')->name('parent.process-admission');
Route::get('/parent/admission/processed', function(){
    return view('Parent.nonapproval');
})->name('parent.processed-admission');

Route::get('/checker', 'HomeController@resultpos');
Route::get('/checker/trans', 'HomeController@userTransformer');
Route::get('/pos', 'HomeController@classPos');
Route::get('/registration/deadline', 'HomeController@deadlineRegistrationApi');

//forgot password
Route::get('/password/reset','Auth\ForgotpasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email','Auth\ForgotpasswordController@sendResetLinkEmail')->name('password.email');
//Reset Password Routes
Route::get('/password/reset/{token}','Auth\ResetpasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset','Auth\ResetpasswordController@reset')->name('password-update');


Route::group(['prefix' => 'admin'], function () {

    Route::get('/register', 'Admin\RegisterController@showRegisterForm')->name('admin-register');
    Route::post('/register', 'Admin\RegisterController@register');
    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin-login');
    Route::post('/login', 'Admin\LoginController@authenticate');
    Route::get('/', 'Admin\AdminController@index')->name('dashboard');

    //logout route
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin-logout');

    //Admin CRUD route
    Route::get('/AdminSection', 'Admin\AdminController@Admin')->name('Admin-Section');
    Route::post('/Add-Admin', 'Admin\AdminController@create')->name('Add-Admin');
    Route::post('/Update-Admin', 'Admin\AdminController@update')->name('Update-Admin');
    Route::post('/Delete-Admin', 'Admin\AdminController@destroy')->name('Delete-Admin');

    //Class CRUD route
    Route::get('/ClassSection', 'Admin\UserController@Class')->name('Class-Section');
    Route::post('/Add-Class', 'Admin\UserController@addClass')->name('Add-Class');
    Route::post('/Delete-Class', 'Admin\UserController@deleteClass')->name('Delete-Class');
    Route::post('/lock/portal/{id}', 'Admin\UserController@lockportal')->name('lock-portal');
    
    //Student CRUD
    Route::get('/StudentSection', 'Admin\UserController@Users')->name('Student-Section');
    Route::post('/Add-Student', 'Admin\UserController@createUser')->name('Add-Student');
    Route::post('/Delete-Student', 'Admin\UserController@destroy')->name('Delete-Student');
    Route::get('/restore-Student', 'Admin\UserController@restoreStudentsView')->name('restore.view');
    Route::post('/restore-Student/{id}', 'Admin\UserController@restoreStudents')->name('restore.student');
    Route::post('/delete-Student/force/{id}', 'Admin\UserController@forceDelete')->name('forcedelete.student');

    //Subject CRUD
    Route::get('/SubjectSection', 'Admin\UserController@Subjects')->name('Subject-Section');
    Route::post('/Add-Subject', 'Admin\UserController@createSubject')->name('Add-Subject');
    Route::post('/Delete-Subject', 'Admin\UserController@deleteSubject')->name('Delete-Subject');

    //Result
    Route::get('/result', 'Admin\UserController@resultView')->name('result');
    Route::get('/addresult/{id}', 'Admin\UserController@addresultView')->name('add-result');
    Route::get('/result/students/{id}', 'Admin\UserController@resultStudent');
    Route::post('/result/submit/', 'Admin\UserController@submitResult')->name('submit-result');

    //admission
    Route::get('/view/parent/admission', 'Admin\AdmissionController@getAdmissionProcess')->name('admin.admission');
    Route::get('/view/parent/admission/{id}', 'Admin\AdmissionController@viewAdmission')->name('admin.admission.view');
    Route::get('/parent/admission/approve/{id}', 'Admin\AdmissionController@approveAdmission')->name('admin.admission.approve');
    Route::post('/parent/admission/reject/{id}', 'Admin\AdmissionController@rejectAdmission')->name('admin.admission.reject');
    Route::get('/all/parent/', 'Parent\ParentController@getAllParent')->name('admin.all.parent');

    //Registration route
    Route::get('/course/registration/deadline/{id}','Admin\UserController@courseRegistrationView')->name('deadline.view');
    Route::post('/course/registration/deadline/','Admin\UserController@courseRegistration')->name('deadline.post');

    //forgot password
    Route::get('/password/reset','Admin\ForgotpasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email','Admin\ForgotpasswordController@sendResetLinkEmail')->name('admin.password-email');
    //Reset Password Routes
    Route::get('/password/reset/{token}','Admin\ResetpasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset','Admin\ResetpasswordController@reset')->name('admin.password-update');
});

