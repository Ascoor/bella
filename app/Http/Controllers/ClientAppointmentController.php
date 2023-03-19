<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\Doctor;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\AppointmentCreated;
use Illuminate\Http\Request;

class ClientAppointmentController extends Controller
{
    public function showForm()
    {
        // You can pass data to the form view here, such as a list of available doctors.
        return view('appointments.form');

    }

    public function submitForm(Request $request)
    {
        // Validate the form input.
        $validatedData = $request->validate([
            'doctor_id' => 'required',
            'apt_datetime' => 'required',
            'client_name' => 'required',
            'client_phone' => 'required',
        ]);

        // Check if a client with the provided phone number already exists
        $client = Client::where('client_phone', $validatedData['client_phone'])->first();

        if (!$client) {
            // If the client doesn't exist, create a new one.
            $client = Client::create([
                'client_name' => $validatedData['client_name'],
                'client_phone' => $validatedData['client_phone'],
            ]);
        }

        // Create the appointment.
        $doctor = Doctor::find($validatedData['doctor_id']);
$section_id = $doctor->section->id;

$appointment = Appointment::create([
    'doctor_id' => $validatedData['doctor_id'],
    'apt_datetime' => $validatedData['apt_datetime'],
    'client_id' => $client->id,
    'section_id' => $section_id,
]);
        // Send notification to users and doctors associated with the appointment
        $users = User::all();
        Notification::send($users, new AppointmentCreated($appointment));

        // Redirect back to the welcome page with a success message.
        return view('thanks')->with('appointment',$appointment);
    }
}
