<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientHistoryController;
use App\Http\Controllers\AppointmentController;

use App\Http\Controllers\AssestController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorAuthController;
use App\Http\Controllers\DoctorDashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\NotificationController;
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

// Route::get('/ww', function () {
//     return view('thanks', [
//         'appointments' => Appointment::all(),
//     ]);

// });
Route::get('/', function () {
    return view('welcome', [        'doctors' => Doctor::all(),    ]);
});

Route::post('/submit', [ClientAppointmentController::class, 'submitForm'])->name('appointments.submitForm');

// define routes for doctor's dashboard
    Route::prefix('doctor')->group(function () {
        // login route

        // Doctor login routes
        Route::get('/login', [DoctorAuthController::class, 'showLoginForm'])->name('doctor.login');
        Route::post('/login', [DoctorAuthController::class, 'login'])->name('doctor.login.post');
        // logout route
        Route::post('/logout', [DoctorAuthController::class, 'logout'])->name('doctor.logout');


        // dashboard route (authenticated)
        Route::middleware(['auth:doctor'])->group(function () {
            Route::get('/dashboard',[DoctorDashboardController::class ,'index'])->name('doctor.dashboard');
            Route::get('/appointments',[DoctorDashboardController::class ,'appointments'])->name('doctor.appointments');
            Route::get('/clients',[DoctorDashboardController::class ,'clients'])->name('doctor.clients');
            Route::get('/clients/history',[ClientHistoryController::class ,'show'])->name('client.history');
            Route::resource('client-history', ClientHistoryController::class);

            Route::put('/doctor/complete_appointment/{id}', [DoctorDashboardController::class, 'completeAppointment'])->name('doctor_dashboard.complete_appointment');
            Route::get('/doctor/mark-notifications-as-read', [DoctorDashboardController::class, 'markNotificationsAsRead'])->name('doctor.markNotificationsAsRead');

            Route::put('/doctor/reject_appointment/{id}', [DoctorDashboardController::class, 'rejectAppointment'])->name('doctor_dashboard.reject_appointment');
            Route::get('/doctor_dashboard/show_appointment/{id}', [DoctorDashboardController::class, 'showAppointment'])->name('doctor_dashboard.show_appointment');
            Route::post('/doctor_dashboard/update_appointment/{id}', [DoctorDashboardController::class, 'updateAppointment'])->name('doctor.appointment.update');
        });
    });
    Route::get('/events', [EventController::class, 'index']);
    Route::get('/events/list', [EventController::class, 'list']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/appointments', [AppointmentController::class, 'listAppointments'])->name('appointments.list');
Route::get('/appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');
Route::post('/appointments/store', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointments.store');
Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
Route::put('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
Route::get('/appointments', [AppointmentController::class, 'sort'])->name('appointments.sort');
Route::resource('clients', ClientController::class);
Route::resource('invoices', InvoiceController::class);
Route::resource('invoicedetails', InvoicesDetailsController::class);
Route::resource('sections', SectionController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('assests', AssestController::class);
Route::resource('services', ServiceController::class);
Route::resource('expenses', ExpenseController::class);
Route::resource('revenues', RevenueController::class);

Route::get('expenses_revenues', [ExpensesAndRevenuesController::class, 'index'])->name('expenses_revenues');

Route::post('/notifications/read', [NotificationController::class, 'read'])->name('notifications.read');

Route::get('/notifications/count', [NotificationController::class, 'getNotificationsCount'])->middleware('auth')->name('notifications.count');
Route::get('/notifications/index', [NotificationController::class, 'getNotificationsCount'])->middleware('auth')->name('notifications.index');

Route::put('/notifications/{id}/markAsRead', [NotificationController::class, 'markAsRead'])->middleware('auth')->name('notifications.markAsRead');
Route::delete('/notifications/{id}', [NotificationController::class,'destroy'])->name('notifications.destroy');


Route::resource('income_types', IncomeTypeController::class);
Route::resource('expense_types', ExpenseTypeController::class);
Route::get('/section/services/{id}', function ($section_id) {
    $services = DB::table('services')->where('section_id', $section_id)->get();
    return response()->json($services);
});
