<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/sendsms', function () {
    
// });

Route::get('/', 'FrontEndController@default')->name('page_default');

// Dashboard del cliente
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/appointments', 'HomeController@appointments')->name('home.appointments');
Route::get('/home/prescriptions', 'HomeController@prescriptions')->name('home.prescriptions');
Route::get('/home/prescriptions/details/{id}/{type?}', 'HomeController@prescriptions_details_pdf')->name('home.prescriptions.details.pdf');
Route::get('/home/order_analysis', 'HomeController@order_analysis')->name('home.order_analysis');
Route::get('/home/order_analysis/details/{id}/{type?}', 'HomeController@order_analysis_details_pdf')->name('home.order_analysis.details.pdf');
Route::get('/profile', 'HomeController@profile')->name('profile');

Auth::routes();

Route::get('login/{social}', 'SocialiteController@redirectToProvider')->name('socialLogin');
Route::get('login/{social}/callback', 'SocialiteController@handleProviderCallback');

Route::get('/page/{slug}', 'FrontEndController@pages')->name('pages');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    // Specialists
    Route::resource('specialists', 'SpecialistsController');
    Route::get('specialists/list/{search}', 'SpecialistsController@list');
    Route::get('specialists/get/{search}', 'SpecialistsController@get');
    Route::get('specialists/specialities/{id}', 'SpecialistsController@specialities');
    Route::get('specialists/schedules/{id}', 'SchedulesController@schedules_details');
    Route::post('specialists/schedules/store', 'SchedulesController@schedules_store')->name('specialists.schedules.store');
    Route::get('specialists/update/status/{id}/{value}', 'SpecialistsController@edit_status');


    // Customers
    Route::resource('customers', 'CustomersController');
    Route::get('customers/list/{search}', 'CustomersController@list');
    Route::post('customers/update/avatar', 'CustomersController@update_avatar');

    // Appointments
    Route::resource('appointments', 'AppointmentsController');
    Route::get('appointments/list/{search}', 'AppointmentsController@list');
    Route::get('appointments/status/{id}/{status?}', 'AppointmentsController@update_status');
    Route::get('appointments/tracking/{id}', 'AppointmentsController@tracking_duration');
    Route::get('appointments/observations/browse/{id}', 'AppointmentsController@browse_observations');
    Route::post('appointments/observations/create', 'AppointmentsController@create_observations');

    // Prescriptions
    Route::resource('prescriptions', 'PrescriptionsController');

    // Analisys Customer
    Route::resource('analysiscustomer', 'AnalyisisCustomersController');


    Route::get('{page_id}/edit', 'PageController@edit')->name('page_edit'); 
    Route::post('/page/{page_id}/update', 'PageController@update')->name('page_update');
    Route::get('/page/{page_id}/default', 'PageController@default')->name('page_default'); 

    Route::get('{page_id}/index', 'BlockController@index')->name('block_index'); 
    Route::post('/block/update/{block_id}', 'BlockController@update')->name('block_update');
    Route::get('/block/delete/{block_id}', 'BlockController@delete')->name('block_delete');
    Route::get('/block/order/{block_id}/{order}', 'BlockController@block_ordering');

    Route::get('/block/move_up/{block_id}', 'BlockController@move_up')->name('block_move_up'); 
    Route::get('/block/move_down/{block_id}', 'BlockController@move_down')->name('block_move_down');
});

// Meets
Route::get('meet/{id}', 'MeetingsController@join');
Route::post('meet/divert_call', 'MeetingsController@divert_call');
Route::post('meet/rating/store', 'MeetingsController@rating_store');


// Logout costumized
Route::post('admin/logout', 'Controller@logout')->name('voyager.logout');