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


return view('doctor.dashboard');

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
}
