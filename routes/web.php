<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AssestController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorAuthController;
use App\Http\Controllers\DoctorDashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Http\Controllers\ExpensesAndRevenuesController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseTypeController;
use App\Http\Controllers\IncomeTypeController;
use App\Http\Controllers\RevenueController;
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
    return view('thanks', [
        'appointments' => Appointment::all(),
    ]);

});
Route::post('/notifications/read', [NotificationController::class, 'read'])->name('notifications.read');

Route::get('/notifications/count', [NotificationController::class, 'getNotificationsCount'])->middleware('auth')->name('notifications.count');
Route::get('/notifications/index', [NotificationController::class, 'getNotificationsCount'])->middleware('auth')->name('notifications.index');

Route::put('/notifications/{id}/markAsRead', [NotificationController::class, 'markAsRead'])->middleware('auth')->name('notifications.markAsRead');
Route::delete('/notifications/{id}', 'NotificationController@destroy');




Route::get('/', function () {
    return view('welcome', [
        'doctors' => Doctor::all(),
    ]);
});

Route::post('/submit', [AppointmentController::class, 'submitForm'])->name('appointments.submitForm');
Auth::routes();

// define routes for doctor's dashboard
Route::prefix('doctor')->group(function () {
    // login route

// Doctor login routes
Route::get('/login', [DoctorAuthController::class, 'showLoginForm'])->name('doctor.login');
Route::post('/login', [DoctorAuthController::class, 'login'])->name('doctor.login.post');
    // logout route
    Route::post('/logout', 'DoctorAuthController@logout')->name('doctor.logout');

    // dashboard route (authenticated)
    Route::middleware(['auth:doctor'])->group(function () {
        Route::get('/dashboard',[DoctorDashboardController::class ,'index'])->name('doctor.dashboard');
        Route::get('/appointments',[DoctorDashboardController::class ,'appointments'])->name('doctor.appointments');
        Route::get('/clients',[DoctorDashboardController::class ,'clients'])->name('doctor.clients');
    });
});

Route::get('/appointments', [AppointmentController::class, 'listAppointments'])->name('appointments.list');
Route::get('/appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');
Route::post('/appointments/store', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointments.store');
Route::delete('/appointments/{id}', 'App\Http\Controllers\AppointmentController@destroy')->name('appointments.destroy');

Route::put('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');

Route::get('/appointments', [AppointmentController::class, 'sort'])->name('appointments.sort');

Route::resource('invoicedetails', InvoicesDetailsController::class);
Route::resource('sections', SectionController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('assests', AssestController::class);
Route::resource('services', ServiceController::class);
Route::resource('expenses', ExpenseController::class);
Route::resource('revenues', RevenueController::class);
Route::get('expenses_revenues', [ExpensesAndRevenuesController::class, 'index'])->name('expenses_revenues');


Route::get('/expense_types', [ExpenseTypeController::class, 'index']);
Route::get('/expense_types/{id}', [ExpenseTypeController::class, 'show']);
Route::post('/expense_types', [ExpenseTypeController::class, 'store']);
Route::put('/expense_types/{id}', [ExpenseTypeController::class, 'update']);
Route::delete('/expense_types/{id}', [ExpenseTypeController::class, 'destroy']);
Route::resource('income-types', IncomeTypeController::class);


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

