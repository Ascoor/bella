<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Notifications\AppointmentNotification;
use Illuminate\Support\Facades\Notification;

class AppointmentController extends Controller
{
    /**
     * Show the appointment form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showForm()
    {
        // You can pass data to the form view here, such as a list of available doctors.
        return view('appointments.form');
    }
    public function create()
    {
        $doctors= Doctor::all();
        return view('appointment.create')->with('doctors',$doctors);
    }

    /**
     * Handle a submitted appointment form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submitForm(Request $request)
    {
        // Validate the form input.
        $validatedData = $request->validate([
            'doctor_id' => 'required',
            'apt_time' => 'required',
            'apt_date' => 'required|date_format:Y-m-d',
            'client_name' => 'required',
            'client_phone' => 'required',
        ]);

        // Create the client.
        $client = Client::create([
            'client_name' => $validatedData['client_name'],
            'client_phone' => $validatedData['client_phone'],
        ]);

        // Create the appointment.
        $appointment = Appointment::create([
            'doctor_id' => $validatedData['doctor_id'],
            'apt_time' => $validatedData['apt_time'],
            'apt_date' => $validatedData['apt_date'],
            'client_id' => $client->id,

        ]);

// Send notification to users and doctors associated with the appointment
$users = User::all();
Notification::send($users, new AppointmentNotification($appointment));


        // Redirect back to the welcome page with a success message.
        return view('thanks')->with('success', 'Appointment created successfully!');
    }

    /**
     * Show the list of appointments in the backend.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAppointments()
    {
        // Get all appointments with their associated clients and doctors.
        $appointments = Appointment::with('client', 'doctor')->get();
$doctors = Doctor::all();
        // You can pass data to the appointments list view here, such as the list of appointments.
        return view('appointment.index', compact('appointments'))->with('doctors',$doctors);
    }
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);

        return view('appointment.show', ['appointment' => $appointment]);
    }
    public function edit($id)
    {
        $appointment = Appointment::find($id);
$doctors = Doctor::all();
        return view('appointment.edit', [
            'appointment' => $appointment,
            'appointment' => $appointment,
            'doctors'=> $doctors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $appointment = Appointment::find($id);
        $appointment->apt_date = $request->input('apt_date');
        $appointment->apt_time = $request->input('apt_time');
        $appointment->status = $request->input('status');

        $appointment->doctor_id = $request->input('doctor_id');

        $appointment->edited_by = auth()->user()->id;
        $appointment->remarks = $request->input('remarks');
        $appointment->save();

        return redirect()->route('appointments.show', ['appointment' => $appointment->id]);
    }
    public function store(Request $request)
    {
        // Validate the form input.
        $validatedData = $request->validate([
            'doctor_id' => 'required',
            'apt_time' => 'required',
            'apt_date' => 'required|date_format:Y-m-d',
            'client_name' => 'required',
            'client_phone' => 'required',
        ]);

        // Create the client.
        $client = Client::create([
            'client_name' => $validatedData['client_name'],
            'client_phone' => $validatedData['client_phone'],
        ]);

        // Create the appointment.
        $appointment = Appointment::create([
            'doctor_id' => $validatedData['doctor_id'],
            'apt_time' => $validatedData['apt_time'],
            'apt_date' => $validatedData['apt_date'],
            'client_id' => $client->id,

        ]);

        // Redirect the user to a page with a success message
        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')
                         ->with('success', 'Appointment deleted successfully');
    }

}
