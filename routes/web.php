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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontEndController@default')->name('page_default');

// Dashboard del cliente
Route::get('/home', 'HomeController@index')->name('home');
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


    // Customers
    Route::resource('customers', 'CustomersController');
    Route::get('customers/list/{search}', 'CustomersController@list');
    Route::post('customers/update/avatar', 'CustomersController@update_avatar');

    // Appointments
    Route::resource('appointments', 'AppointmentsController');
    Route::get('appointments/list/{search}', 'AppointmentsController@list');
    Route::get('appointments/status/{id}/{status}', 'AppointmentsController@update_status');
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
