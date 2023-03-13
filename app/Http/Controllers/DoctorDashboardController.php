<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorDashboardController extends Controller
{
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

return view('doctor.dashboard', [
    'notifications' => $notifications,
    'clientCount' => $clientCount,
    'appointmentCount' => $appointmentCount
]);$processedCount = Appointment::where('doctor_id', $doctor->id)
->where('status', 'processed')
->count();

$completedCount = Appointment::where('doctor_id', $doctor->id)
->where('status', 'completed')
->count();

$rejectedCount = Appointment::where('doctor_id', $doctor->id)
->where('status', 'rejected')
->count();



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
    $appointment = Appointment::find($id);
    // Do any additional processing you need with the appointment data
    return view('doctor.appointment_show', compact('appointment'));
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
