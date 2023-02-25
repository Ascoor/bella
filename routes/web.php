<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AssestController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorDashboardController;
use App\Http\Controllers\InvoiceController;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::get('/ww', function () {
    return view('ex.icons', [
        'doctors' => Doctor::all(),
    ]);

});
Route::get('/notifications/read', [NotificationController::class, 'read'])->middleware('auth')->name('notifications.read');

Route::get('/notifications/count', [NotificationController::class, 'getNotificationsCount'])->middleware('auth')->name('notifications.count');

Route::put('/notifications/{id}/markAsRead', [NotificationController::class, 'markAsRead'])->middleware('auth')->name('notifications.markAsRead');

Route::delete('/notifications/{id}', function ($id) {
    auth()->user()->notifications()->findOrFail($id)->delete();

    return redirect()->back()->with('success', 'Notification has been deleted.');
})->middleware('auth')->name('notifications.destroy');
// define routes for doctor's dashboard
Route::prefix('doctor')->group(function () {
    // login route

    Route::get('/doctor/login', [DoctorController::class, 'loginForm'])->name('doctor.login.form');
    Route::post('/doctor/login', [DoctorController::class, 'login'])->name('doctor.login');


    // logout route
    Route::post('/logout', 'DoctorAuthController@logout')->name('doctor.logout');

    // dashboard route (authenticated)
    Route::middleware(['auth:doctor'])->group(function () {
        Route::get('/',[DoctorDashboardController::class ,'index'])->name('doctor.dashboard');
        Route::get('/appointments', 'DoctorDashboardController@appointments')->name('doctor.appointments');
        Route::get('/clients', 'DoctorDashboardController@clients')->name('doctor.clients');
    });
});



Route::get('/', function () {
    return view('welcome', [
        'doctors' => Doctor::all(),
    ]);
});

Route::post('/submit', [AppointmentController::class, 'submitForm'])->name('appointments.submitForm');
Auth::routes();
Route::get('/appointments', [AppointmentController::class, 'listAppointments'])->name('appointments.list');
Route::get('/appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');
Route::post('/appointments/store', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointments.store');

Route::put('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');



Route::resource('sections', SectionController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('assests', AssestController::class);
Route::resource('services', ServiceController::class);
Route::get('/section/services/{id}', function ($section_id) {
    $services = DB::table('services')->where('section_id', $section_id)->get();
    return response()->json($services);
    return json_encode($services);

});





Route::resource('clients', ClientController::class);
// Route::resource('appointments', AppointmentController::class);
Route::resource('invoices', InvoiceController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{page}', [App\Http\Controllers\AdminController::class, 'index'])->name('{page}');

