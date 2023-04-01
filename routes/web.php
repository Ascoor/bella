<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientHistoryController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClientAppointmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AssestController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorAuthController;
use App\Http\Controllers\AssestAuthController;
use App\Http\Controllers\DoctorDashboardController;
use App\Http\Controllers\AssestDashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ExpensesAndRevenuesController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseTypeController;
use App\Http\Controllers\IncomeTypeController;
use App\Http\Controllers\RevenueController;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Doctor;

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
//     return view('index', [
//         'appointments' => Appointment::all(),
//     ]);

// });
Route::get('/', function () {
    return view('welcome', [        'doctors' => Doctor::all(),    ]);
});

 // Client Submit
Route::post('/submit', [ClientAppointmentController::class, 'submitForm'])->name('appointments.submitForm');


// Event For DashBoard
Route::get('/events', [EventController::class, 'index']);
Route::get('/events/list', [EventController::class, 'list']);

        // user Auth
    Auth::routes();


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::put('profile',[ProfileController::class ,'update'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class ,'password'])->name('profile.password');
    Route::get('/profile',[ProfileController::class ,'edit'])->name('profile.edit');
    // Doctors comments


    // Appointment Routes
    Route::get('/appointments', [AppointmentController::class, 'listAppointments'])->name('appointments.list');
    Route::get('/appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');
    Route::get('/appointments/{id}/new-invoice', [AppointmentController::class, 'addInvoice'])->name('appointments.new-invoice');
    Route::post('/appointments/new-invoice', [AppointmentController::class, 'Invoicestore'])->name('appointments.invoice');
    Route::post('/appointments/store', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointments.store');
    Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    Route::put('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::get('/appointments', [AppointmentController::class, 'sort'])->name('appointments.sort');

    //Resources Route
    Route::resource('clients', ClientController::class);
    Route::resource('invoicedetails', InvoicesDetailsController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('doctors', DoctorController::class);
    Route::resource('assests', AssestController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('revenues', RevenueController::class);
    Route::resource('income_types', IncomeTypeController::class);
    Route::resource('expense_types', ExpenseTypeController::class);

    // Invoice Routes
    Route::post('/status_update/{id}', [InvoiceController::class,'statusUpdate'])->name('status_update');
    Route::get('/invoice/{id}/attachments', [InvoiceController::class,'showAttachments'])->name('invoice. attachments');
    Route::resource('invoices', InvoiceController::class);
    Route::get('invoices.sort',[ InvoiceController::class,'sort'])->name('invoices.sort');
    Route::delete('invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');

    Route::post('invoices/add-attachments', [InvoiceController::class,'addAttachments'])->name('invoices.addAttachments');
    Route::get('/status_show/{id}', [InvoiceController::class,'show'])->name('status_show');

    Route::get('invoices/{invoice_number}/attachments/{filename}', 'App\Http\Controllers\InvoicesDetailsController@download')->name('download.attachment');
    Route::get('invoices/{invoice_number}/attachments/{filename}/view', 'App\Http\Controllers\InvoicesDetailsController@view')->name('view.attachment');

    //   Expenses Revenues Routes
    Route::get('expenses_revenues', [ExpensesAndRevenuesController::class, 'index'])->name('expenses_revenues');

    //   Client Info
    Route::get('/clients/history/{client_id}', [ClientHistoryController::class, 'getClientInfo'])->name('client.history');

    // Notifications Route
    Route::post('/notifications/read', [NotificationController::class, 'read'])->name('notifications.read');
    Route::get('/notifications/count', [NotificationController::class, 'getNotificationsCount'])->middleware('auth')->name('notifications.count');
    Route::get('/notifications/index', [NotificationController::class, 'getNotificationsCount'])->middleware('auth')->name('notifications.index');
    Route::put('/notifications/{id}/markAsRead', [NotificationController::class, 'markAsRead'])->middleware('auth')->name('notifications.markAsRead');
    Route::delete('/notifications/{id}', [NotificationController::class,'destroy'])->name('notifications.destroy');

    // Ajax Routes
    Route::get('/section/services/{id}', function ($section_id) {
        $services = DB::table('services')->where('section_id', $section_id)->get();
        $doctors = DB::table('doctors')->where('section_id', $section_id)->get();
        $data = [
            'services' => $services,
            'doctors' => $doctors
        ];
        return response()->json($data);
    });

