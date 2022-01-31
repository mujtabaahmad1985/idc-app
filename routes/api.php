<?php

use Illuminate\Http\Request;

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



Route::post('/login', 'Api\Authentication@login');


Route::get('patient/me','Api\PatientApi@getPatientBasicInformation');
Route::get('patient/refferal','Api\PatientApi@getPatientReferrals');
Route::get('patient/documents','Api\PatientApi@getPatientDocuments');
Route::get('patient/medical/conditions','Api\PatientApi@getPatientMedication');
Route::get('patient/appointments','Api\PatientApi@getPatientAppointments');
Route::get('/validate/code','Api\PatientApi@validate_code');
Route::get('/patient/invoices','Api\PatientApi@getPatientInvoices');