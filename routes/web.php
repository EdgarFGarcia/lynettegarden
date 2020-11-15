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