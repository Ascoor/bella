<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
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
    $doctors = Doctor::all();
    $services = Service::all();
    return view('welcome')->with('doctors',$doctors)->with('services',$services);
});
Route::controller(AppointmentController::class)->group(function () {

    Route::post('store', 'clientstore')->name('clientstore');
});
Route::resource('appointments', AppointmentController::class);
Route::resource('clients', ClientController::class);
Route::resource('services', ServiceController::class);
Route::resource('doctors', DoctorController::class);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
