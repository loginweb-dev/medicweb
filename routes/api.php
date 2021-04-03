<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/login', 'ApiController@login');
Route::post('/auth/register', 'ApiController@register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/index', 'ApiController@index');
    Route::post('/appointment/store', 'ApiController@appointment_store');
    Route::get('/appointment/active/{customer_id}', 'ApiController@get_last_appointment_active'); 
    Route::get('/historial/{customer_id}', 'ApiController@historial');

    // Appointment
    Route::post('appointments/validate_appointment/{id}', 'ApiController@validate_appointment');
    Route::get('appointments/customer/{id}/{specialist_id}/{speciality_id}', 'AppointmentsController@customer');
    Route::get('appointments/status/{id}/{status?}', 'AppointmentsController@update_status');
    Route::get('appointments/tracking/{id}', 'AppointmentsController@tracking_duration');
    Route::post('meet/rating/store', 'MeetingsController@rating_store');
});

// Rutas funcionales
Route::get('/payment_accounts', 'ApiController@payment_accounts_index');
Route::get('/services', 'ApiController@services_index');