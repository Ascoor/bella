<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DoctorDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $doctor = Auth::guard('doctor')->user();

if (!$doctor) {
    abort(403, 'Unauthorized action.');
}

$notifications = $doctor->notifications()->orderBy('created_at', 'desc')->get();
$clientCount = Appointment::selectRaw('count(distinct(client_id)) as count')
    ->where('doctor_id', $doctor->id)
    ->get()
    ->first()
    ->count;
$appointmentCount = Appointment::where('doctor_id', $doctor->id)->count();


$completedCount = Appointment::where('doctor_id', $doctor->id)
->where('status', 'complete')
->count();

$rejectedCount = Appointment::where('doctor_id', $doctor->id)
->where('status', 'rejected')
->count();
return view('doctor.dashboard', [
    'notifications' => $notifications,
    'clientCount' => $clientCount,
    'appointmentCount' => $appointmentCount,

    'completedCount' => $completedCount,
    'rejectedCount' => $rejectedCount
]);
           }

public function appointments()
{
    $doctorId = Auth::guard('doctor')->user()->id; // get the currently authenticated doctor's ID
    $doctor = Doctor::where('id', $doctorId)->first(); // retrieve the doctor's record from the doctors table
    $appointments = Appointment::where('doctor_id', $doctorId)
    ->whereNotNull('remarks') // retrieve only appointments with non-null apt_datetime value
    ->get(); // retrieve appointments for the doctor
$clients = Client::all();
    return view('doctor.appointments')->with('cliennts',$clients)->with('appointments', $appointments);
}

public function clients()
{
    $clients = Client::all();
    return view('doctor.clients')->with('clients',$clients);
}
public function showAppointment($id)
{
    $appointment = Appointment::findOrFail($id);
    $doctor = $appointment->doctor;
    $section = $doctor->section;

    // Get the services that belong to the doctor's section
    $services = $section->services;

    return view('doctor.appointment_show', compact('appointment', 'services'));
}


public function updateAppointment(Request $request, $id)
{
    $appointment = Appointment::findOrFail($id);



    $validatedData = $request->validate([
        'services' => 'nullable|array',
        'services.*' => 'exists:services,id',
        // Other validation rules for other appointment attributes here
    ]);

    $appointment->update($validatedData);

    // Attach the selected services to the appointment
    if (!empty($request->services)) {
        $appointment->services()->sync($request->services);
    }

    session()->flash('success', 'Appointment updated successfully.');
    return redirect()->route('doctor.appointments');
}
public function getClientInfo($clientId)
{
    $client = Client::find($clientId);

    if (!$client) {
        abort(404, 'Client not found');
    }

    return view('doctor.client_show', ['client' => $client]);
}

public function completeAppointment($id)
{
    $appointment = Appointment::find($id);
    $appointment->status = 'complete';

    $appointment->save();
    session()->flash('complete','تم اتمام الحجز');
    return redirect()->back();
}

public function rejectAppointment($id)
{
    $appointment = Appointment::find($id);
    $appointment->status = 'rejected';

    $appointment->save();
    session()->flash('rejected','تم إلغاء الحجز');
    return redirect()->back();
}
public function markNotificationsAsRead(Request $request)
{
    Auth::guard('doctor')->user()->unreadNotifications->markAsRead();
    return redirect()->back();
}



}
