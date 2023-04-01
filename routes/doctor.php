
<?php


use App\Http\Controllers\ClientHistoryController;

use App\Http\Controllers\DoctorAuthController;

use App\Http\Controllers\DoctorDashboardController;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Doctor;




// define routes for doctor's dashboard
Route::prefix('doctor')->group(function () {

    // Doctor login routes
    Route::get('/', [DoctorAuthController::class, 'showLoginForm'])->name('doctor.login');
    // Route::get('/login', [DoctorAuthController::class, 'showLoginForm'])->name('doctor.login');
    Route::post('/login', [DoctorAuthController::class, 'login'])->name('doctor.login.post');
    // logout route
    Route::post('/logout', [DoctorAuthController::class, 'logout'])->name('doctor.logout');


// dashboard route (authenticated)
   Route::middleware(['auth:doctor'])->group(function () {
    Route::get('/dashboard',[DoctorDashboardController::class ,'index'])->name('doctor.dashboard');
    Route::get('/appointments',[DoctorDashboardController::class ,'appointments'])->name('doctor.appointments');
    Route::get('/clients',[DoctorDashboardController::class ,'clients'])->name('doctor.clients');

    Route::resource('client-history', ClientHistoryController::class);
//   Client Info
Route::get('/clients/info/{client_id}', [DoctorDashboardController::class, 'getClientInfo'])->name('client.info');

    Route::put('/doctor/complete_appointment/{id}', [DoctorDashboardController::class, 'completeAppointment'])->name('doctor_dashboard.complete_appointment');
    Route::get('/doctor/mark-notifications-as-read', [DoctorDashboardController::class, 'markNotificationsAsRead'])->name('doctor.markNotificationsAsRead');

    Route::put('/doctor/reject_appointment/{id}', [DoctorDashboardController::class, 'rejectAppointment'])->name('doctor_dashboard.reject_appointment');
    Route::get('/doctor_dashboard/show_appointment/{id}', [DoctorDashboardController::class, 'showAppointment'])->name('doctor_dashboard.show_appointment');
    Route::post('/doctor_dashboard/update_appointment/{id}', [DoctorDashboardController::class, 'updateAppointment'])->name('doctor.appointment.update');
});
});
