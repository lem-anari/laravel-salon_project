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

Route::get('/', IndexController::class)->name('main');
Route::get('/services', ServicesController::class)->name('services');

Route::get('/about', AboutController::class)->name('about');
Route::get('/contacts', ContactsController::class)->name('contacts');
Route::get('/admins_panel', AdminsPanel::class)->name('admins_panel');
Route::get('/staff_panel', StaffPanelController::class)->name('staff_panel');

Route::get('/staff_salary', 'StaffPanelController@show_staff_salary')->name('staff_salary');
Route::get('/staff_schedule', 'StaffPanelController@show_staff_schedule')->name('staff_schedule');


Route::get('/post/{id?}', 'SinglePostController@firstStep')->name('single_post');
Route::post('/post/{id?}', 'SinglePostController@nextStep')->name('single_post');
///////////////////
Route::post('/clients/schedule', 'SingleRegistrationController@nextStep2')->name('nxt');
Route::post('/clients/schedule2', 'SingleRegistrationController@nextStep3')->name('nxt2');




Route::get('/redact/add_client', 'AdminRedactController@add_client')->name('add_client');
Route::post('/redact/add_client', 'AdminRedactController@save')->name('add_client');

Route::get('/redact/add_registration', 'AdminRedactController@add_registration')->name('add_registration');
Route::post('/redact/add_registration', 'AdminRedactController@showNext')->name('add_registration');
Route::post('/redact/add_registration_', 'AdminRedactController@showNext2')->name('add_registration_');
Route::post('/redact/add_registration__', 'AdminRedactController@showNext3')->name('add_registration__');
Route::post('/redact/save_registration', 'AdminRedactController@save_registration')->name('save_registration');



Route::get('/redact/add_service', 'AdminRedactController@add_service')->name('add_service');
Route::post('/redact/add_service', 'AdminRedactController@save_service')->name('add_service');

Route::get('/view_registrations', 'AdminRedactController@view_registrations')->name('view_registrations');

Route::get('/redact/add_staff', 'AdminRedactController@add_staff')->name('add_staff');
Route::post('/redact/add_staff', 'AdminRedactController@save_staff')->name('add_staff');

Route::get('/redact/fire_staff', 'AdminRedactController@fire_staff')->name('fire_staff');
Route::delete('/redact/fire_staff', 'AdminRedactController@fire_staff')->name('fire_staff');

Route::get('/redact/add_schedule', 'AdminRedactController@add_schedule')->name('add_schedule');
Route::post('/redact/add_schedule', 'AdminRedactController@save_schedule')->name('add_schedule');

Route::get('/redact/salary', 'AdminRedactController@add_fineBonusSalary')->name('salary');
Route::post('/redact/salary', 'AdminRedactController@save_fineBonusSalary')->name('salary');

Route::get('/redact/role', 'AdminRedactController@add_role')->name('role');
Route::post('/redact/role', 'AdminRedactController@save_role')->name('role');

Route::get('/redact/add_work_day', 'AdminRedactController@add_work_day')->name('add_work_day');
Route::post('/redact/add_work_day', 'AdminRedactController@save_work_day')->name('add_work_day');

Route::get('/redact/up_salary', 'AdminRedactController@add_Salary')->name('up_salary');
Route::post('/redact/up_salary', 'AdminRedactController@save_Salary')->name('up_salary');

Route::get('/redact/delete_reg', 'AdminRedactController@delete_reg')->name('delete_reg');
Route::delete('/redact/delete_reg', 'AdminRedactController@delete_reg')->name('delete_reg');

Route::get('/redact/add_reg', 'AdminRedactController@add_registratioon')->name('add_reg');
Route::post('/redact/add_reg', 'AdminRedactController@save_registratioon')->name('add_reg');


Route::get('/income', 'IncomeController@show_income')->name('income');
Route::get('/staff_income', 'IncomeController@show_staff_income')->name('staff_income');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
