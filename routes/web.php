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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    // Specialists
    Route::resource('specialists', 'SpecialistsController');
    Route::get('specialists/list/{search}', 'SpecialistsController@list');

    // Customers
    Route::resource('customers', 'CustomersController');
    Route::get('customers/list/{search}', 'CustomersController@list');

    // Appointments
    Route::resource('appointments', 'AppointmentsController');
    Route::get('appointments/list/{search}', 'AppointmentsController@list');
    Route::get('appointments/status/{id}/{status}', 'AppointmentsController@update_status');

});

// Meets
Route::get('meet/{id}', 'MeetingsController@join');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

