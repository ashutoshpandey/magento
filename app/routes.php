<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*********************************** StaticController pages *****************************/

Route::get('/', 'StaticController@index');

Route::get('/index', 'StaticController@index');

Route::get('/signout', 'StaticController@signout');
Route::get('/eq', 'StaticController@eq');
Route::get('/q', 'StaticController@q');
Route::get('/set-country/{country}', 'StaticController@setCountry');
Route::get('/set-timezone/{timezone}', 'StaticController@setTimezone');

Route::get('/about', function(){
    return View::make('static.about');
});
Route::get('/terms', function(){
    return View::make('static.terms');
});
Route::get('/policies', function(){
    return View::make('static.policy');
});
Route::get('/privacy', function(){
    return View::make('static.privacy');
});

Route::get('/contact', function(){
    return View::make('static.contact');
});
Route::get('/money-return', function(){
    return View::make('static.moneyreturn');
});
Route::get('/news-letter', function(){
    return View::make('static.newsletter');
});
Route::get('/offers', function(){
    return View::make('static.offers');
});
Route::get('/camera', function(){
    return View::make('static.camera');
});
Route::get('/get-country/{id}', 'StaticController@getCountry');
Route::get('/experts/{name}', 'StaticController@experts');
Route::get('/expert-info/{id}', 'StaticController@expertInfo');
Route::get('/payment/{id}', 'StaticController@payment');
Route::get('payment/saveuser', 'AuthenticationController@saveUser');
/*********************************** StaticController pages *****************************/

/*********************************** urls for AuthenticationController *****************************/
Route::get('/register', 'AuthenticationController@register');
Route::get('/register-expert', 'AuthenticationController@expertRegister');
Route::get('/password-recovery', 'AuthenticationController@passwordrecovery');
Route::get('/user-password-sent', 'AuthenticationController@passwordsent');
Route::get('/expert-password-recovery', 'AuthenticationController@expertpasswordrecovery');
Route::get('/expert-password-sent', 'AuthenticationController@expertpasswordsent');
Route::get('/user-login', 'AuthenticationController@userlogin');
Route::get('/expert-login', 'AuthenticationController@expertlogin');
Route::get('/admin', 'AuthenticationController@adminlogin');
Route::post('/check-appointment-login', 'AuthenticationController@isValidUser');

Route::get('/isvaliduser', 'AuthenticationController@isValidUser');
Route::get('/isvalidadmin', 'AuthenticationController@isvalidadmin');
Route::get('/payment/{id}/isvaliduser', 'AuthenticationController@isValidUser');
Route::get('/isduplicateuser', 'AuthenticationController@isduplicateuser');
Route::get('/isvalidexpert', 'AuthenticationController@isvalidexpert');
Route::get('/isduplicateexpert', 'AuthenticationController@isduplicateexpert');
Route::get('/saveuser', 'AuthenticationController@saveUser');
Route::get('/saveexpert', 'AuthenticationController@saveExpert');
Route::get('/senduserpassword', 'AuthenticationController@sendpassword');
Route::get('/sendexpertpassword', 'AuthenticationController@sendExpertPassword');
Route::get('/user-registered', 'AuthenticationController@userSaved');
Route::get('/expert-registered', 'AuthenticationController@expertSaved');
Route::get('/expert-register', 'AuthenticationController@expertRegister');
Route::get('/timezone/{country}', 'AuthenticationController@timezone');

/*********************************** urls for AuthenticationController *****************************/

/*********************************** urls for admin *****************************/
Route::get('/admin/dashboard', 'AdminController@dashboard');
Route::get('/admin/admin-section', 'AdminController@adminSection');
Route::get('/admin/manage-experts', 'AdminController@experts');
Route::get('/admin/create-expert', 'AdminController@createExpert');
Route::post('/admin/save-expert', 'AdminController@saveExpert');
Route::get('/admin/edit-expert/{id}', 'AdminController@editExpert');
Route::get('/admin/remove-expert/{id}', 'AdminController@removeExpert');
Route::post('/admin/update-expert', 'AdminController@updateExpert');

Route::get('/admin/manage-users', 'AdminController@users');
Route::get('/admin/edit-user/{id}', 'AdminController@editUser');
Route::get('/admin/remove-user/{id}', 'AdminController@removeUser');
Route::post('/admin/update-user', 'AdminController@updateUser');

Route::get('/admin/manage-categories', 'AdminController@manageCategories');
Route::get('/admin/load-categories', 'AdminController@loadCategories');
Route::get('/admin/create-category', 'AdminController@createCategory');
Route::get('/admin/edit-category/{id}', 'AdminController@editCategory');
Route::get('/admin/remove-category/{id}', 'AdminController@removeCategory');
Route::post('/admin/update-category', 'AdminController@updateCategory');
Route::post('/admin/save-category', 'AdminController@saveCategory');

Route::get('/admin/manage-subcategories', 'AdminController@manageSubcategories');
Route::get('/admin/subcategory-table/{id}', 'AdminController@subcategoryTable');
Route::get('/admin/create-subcategory', 'AdminController@createSubcategory');
Route::get('/admin/edit-subcategory/{id}', 'AdminController@editSubCategory');
Route::get('/admin/remove-subcategory/{id}', 'AdminController@removeSubCategory');
Route::post('/admin/update-subcategory', 'AdminController@updateSubCategory');
Route::post('/admin/save-subcategory', 'AdminController@saveSubcategory');

Route::get('/admin/categories', 'AdminController@categories');
Route::get('/admin/subcategories/{id}', 'AdminController@subcategories');

Route::get('/admin/appointments', 'AdminController@appointments');
Route::get('/admin-logout', 'AdminController@adminLogout');

Route::get('/admin/user/{id}', 'AdminController@user');
Route::get('/admin/expert/{id}', 'AdminController@expert');
Route::get('/admin/timezone/{country}', 'AdminController@timeZone');


/*********************************** urls for user *****************************/
Route::get('/user/user-section', 'UserController@userSection');
Route::get('/user/dashboard', 'UserController@dashboard');
Route::get('/user/history', 'UserController@history');
Route::get('/user/payments', 'UserController@payments');
Route::get('/user/expert-list', 'UserController@expertList');
Route::get('/user/load-experts', 'UserController@loadExperts');

Route::get('/user/appointments', 'UserController@appointments');
Route::get('/user/cancelled-appointments', 'UserController@cancelledAppointments');
Route::get('/user/book-appointment/{id}', 'UserController@bookAppointment');
Route::get('/user/appointment-booked/{id}', 'UserController@appointmentBooked');
Route::get('/user/cancel-appointment/{id}', 'UserController@cancelAppointment');
Route::get('/user/appointment/{id}', 'UserController@appointment');
Route::get('/user/profile', 'UserController@profile');
Route::post('/user/update-profile', 'UserController@updateProfile');
Route::get('/user/timezone/{country}', 'UserController@timeZone');

Route::get('/user/categories', 'UserController@categories');
Route::get('/user/subcategories/{id}', 'UserController@subcategories');
Route::get('/user-logout', 'UserController@userLogout');

Route::get('/user/video-chat/{id}', 'UserController@videoChat');

Route::get('/user/expert/{id}', 'UserController@expert');

Route::get('/video-chat', 'StaticController@videoChat');
/*********************************** urls for user *****************************/


/*********************************** urls for user *****************************/
Route::get('/categories', 'DataController@categories');
Route::get('/subcategories/{id}', 'DataController@subcategories');
Route::get('/get-experts/{category}', 'DataController@getExperts');
Route::get('/appointment-booked/{id}', 'DataController@appointmentBooked');
Route::get('/book-appointment/{id}', 'DataController@bookAppointment');
Route::get('/booking-form/{id}', 'DataController@bookingForm');
Route::get('/expert-profile/{id}', 'DataController@expertProfile');
Route::get('/booking', 'StaticController@booking');
Route::get('/appointment-login', 'DataController@appointmentLogin');
Route::get('/load-specialist', 'DataController@loadSpecialist');
Route::get('/load-timezones/{country}', 'DataController@loadTimezone');

/*********************************** urls for user *****************************/

/*********************************** urls for expert *****************************/
Route::get('/expert/dashboard', 'ExpertController@dashboard');
Route::get('/expert/expert-section', 'ExpertController@expertSection');

Route::get('/expert/appointments', 'ExpertController@appointments');
Route::get('/expert/appointment/{id}', 'ExpertController@appointment');
Route::get('/expert/cancelled-appointments', 'ExpertController@cancelledAppointments');
Route::get('/expert/cancel-appointment/{id}', 'ExpertController@cancelAppointment');

Route::get('/expert/history', 'ExpertController@history');

Route::get('/expert/availabilities', 'ExpertController@availabilities');
Route::get('/expert/load-availabilities', 'ExpertController@loadAvailabilities');
Route::get('/expert/set-availabilities', 'ExpertController@setAvailabilities');
Route::get('/expert/get-availabilities', 'ExpertController@getAvailabilities');
Route::post('/expert/save-availabilities', 'ExpertController@saveAvailabilities');
Route::get('/expert/cancel-availability/{id}', 'ExpertController@cancelAvailability');

Route::get('/expert/user/{id}', 'ExpertController@user');
Route::get('/expert/profile', 'ExpertController@profile');
Route::post('/expert/update-profile', 'ExpertController@updateProfile');

Route::get('/expert/video-chat/{id}', 'ExpertController@videoChat');
Route::get('/expert/subcategories/{id}', 'ExpertController@subcategories');
Route::get('/expert/timezone/{country}', 'ExpertController@timeZone');

Route::get('/expert-logout', 'ExpertController@expertLogout');
/*********************************** urls for expert *****************************/

Route::filter('expert_check', function () {
    if (Auth::user()->group != 'author') {
        Session::flash('error_msg', '<div class="alert alert-danger alert-dismissable center"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h3>Ilegal operation detected!</h3></div>');
        return Redirect::to('/');
    }
});

/******************************* Test Controller ************************************/
Route::get('/table', function(){
    return View::make('static.table');
});
Route::get('/q', 'TestController@q');
Route::get('/ex', 'TestController@ex');
Route::get('/up', 'TestController@up');