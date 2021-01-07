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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('login');
});
Route::get('/managereservation', [App\Http\Controllers\PageControllers::class, 'managereservation'])->middleware('auth');
Route::get('/managecancelrequest', [App\Http\Controllers\PageControllers::class, 'managecancelrequest'])->middleware('auth');
Route::get('/generatereports', [App\Http\Controllers\PageControllers::class, 'generatereports'])->middleware('auth');
Route::get('/cancellationconfirmation', [App\Http\Controllers\PageControllers::class, 'cancellationconfirmation'])->middleware('auth');

/**
 * 
 * api calls prerequisite for adding a user
 */
Route::get('/getpositions', [App\Http\Controllers\APIControllers::class, 'getpositions'])->middleware('auth');
Route::post('/adduser', [App\Http\Controllers\APIControllers::class, 'adduser'])->middleware('auth');
Route::get('/fetchusers', [App\Http\Controllers\APIControllers::class, 'fetchusers'])->middleware('auth');
Route::get('/getthisuser', [App\Http\Controllers\APIControllers::class, 'getthisuser'])->middleware('auth');
Route::put('/edituser', [App\Http\Controllers\APIControllers::class, 'edituser'])->middleware('auth');
Route::delete('/deletethisuser', [App\Http\Controllers\APIControllers::class, 'deletethisuser'])->middleware('auth');

/**
 * 
 * Api call for necessary data to make reservation
 */
Route::get('/getthemeswedding', [App\Http\Controllers\APIControllers::class, 'getthemeswedding']);
Route::get('/getbirthdaythemes', [App\Http\Controllers\APIControllers::class, 'getbirthdaythemes']);
Route::get('/getsocialgathering', [App\Http\Controllers\APIControllers::class, 'getsocialgathering']);
Route::get('/getgardenevents', [App\Http\Controllers\APIControllers::class, 'getgardenevents']);
Route::get('/checkdatetimeavailability', [App\Http\Controllers\APIControllers::class, 'checkdatetimeavailability']);

/**
 * 
 * Wedding routes
 */
Route::get('/wedding', [App\Http\Controllers\PageControllers::class, 'wedding']);

/**
 * 
 * Birthday routes
 */
Route::get('/birthday', [App\Http\Controllers\PageControllers::class, 'birthday']);

/**
 * 
 * Social Gathering routes
 */
Route::get('/social', [App\Http\Controllers\PageControllers::class, 'social']);

/**
 * 
 * Garden Events routes
 */
Route::get('/garden', [App\Http\Controllers\PageControllers::class, 'garden']);

/**
 * 
 * Api Call for making reservation
 */
Route::post('/makereservation', [App\Http\Controllers\APIControllers::class, 'makereservation']);

/**
 * 
 * Search Control Number
 */
Route::get('/searchthiscontrolnumber', [App\Http\Controllers\APIControllers::class, 'searchthiscontrolnumber']);

/**
 * 
 * Cancel Reservation
 */
Route::put('/cancelreservation', [App\Http\Controllers\APIControllers::class, 'cancelreservation']);

/**
 * 
 * Reports web call
 */
Route::get('/getreservationcount', [App\Http\Controllers\APIControllers::class, 'getreservationcount'])->middleware('auth');
Route::get('/getcancelledreservation', [App\Http\Controllers\APIControllers::class, 'getcancelledreservation'])->middleware('auth');
Route::get('/getconfirmedreservation', [App\Http\Controllers\APIControllers::class, 'getconfirmedreservation'])->middleware('auth');

/**
 * 
 * Manage Reservation WEB Call
 */
Route::get('/fetchmanagereservation', [App\Http\Controllers\APIControllers::class, 'fetchmanagereservation'])->middleware('auth');
Route::get('/getthisrecord', [App\Http\Controllers\APIControllers::class, 'getthisrecord'])->middleware('auth');
Route::post('/updatereservationinformation', [App\Http\Controllers\APIControllers::class, 'updatereservationinformation'])->middleware('auth');
Route::delete('/deletethisreservation', [App\Http\Controllers\APIControllers::class, 'deletethisreservation'])->middleware('auth');

/**
 * 
 * Manage Cancel Request
 */
Route::get('/fetchcancelrequest', [App\Http\Controllers\APIControllers::class, 'fetchcancelrequest'])->middleware('auth');
Route::get('/tobecancelled', [App\Http\Controllers\APIControllers::class, 'tobecancelled'])->middleware('auth');
Route::post('/confirmcancellation', [App\Http\Controllers\APIControllers::class, 'confirmcancellation'])->middleware('auth');
Route::get('/autorevoke', [App\Http\Controllers\APIControllers::class, 'autorevoke'])->middleware('auth');

/**
 * Generate Reports Web Call
 */
Route::get('/generatereport', [App\Http\Controllers\APIControllers::class, 'generatereport'])->middleware('auth');
Route::get('/searchthisreport', [App\Http\Controllers\APIControllers::class, 'searchthisreport'])->middleware('auth');