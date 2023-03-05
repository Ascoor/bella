<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\User;
use App\Notifications\AppointmentCreated;
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
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $appointment = Appointment::create([
            'doctor_id' => $validatedData['doctor_id'],
            'apt_datetime' => $validatedData['apt_datetime'],
            'client_id' => $client->id,
        ]);

        // Send notification to users and doctors associated with the appointment
        $users = User::all();
        Notification::send($users, new AppointmentCreated($appointment));

        // Redirect back to the welcome page with a success message.
        return view('thanks')->with('appointment',$appointment);
    }

    /**
     * Show the list of appointments in the backend.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAppointments()
    {
        // Get all appointments with their associated clients and doctors.
        $appointments = Appointment::all();
$doctors = Doctor::all();
$clients = Client::all();
        // You can pass data to the appointments list view here, such as the list of appointments.
        return view('appointment.index',compact('appointments'))->with('doctors',$doctors)->with('clients',$clients);
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




    public function sort(Request $request)
    {
        $status = $request->query('status');

        $appointments = Appointment::query();

        if ($status) {
            $appointments->where('status', $status);
        }
$doctors = Doctor::all();
$clients = Client::all();
        $appointments = $appointments->orderBy('status')->get();

        return view('appointment.index', [
            'appointments' => $appointments,
        ])->with('doctors', $doctors)->with('clients', $clients);
    }
    public function update(Request $request)
    {
        $appointment = Appointment::findOrFail($request-> id);;
        $appointment->apt_datetime = $request->input('apt_datetime');

        $appointment->status = $request->input('status');

        $appointment->doctor_id = $request->input('doctor_id');

        $appointment->edited_by = Auth::id();
        $appointment->remarks = $request->input('remarks');
        $appointment->save();

        return redirect()->back();
    }
    public function store(Request $request)
    {
        // Validate the form input.
        $validatedData = $request->validate([
            'doctor_id' => 'required',

            'apt_datetime' => 'required',
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

            'apt_datetime' => $validatedData['apt_datetime'],
            'client_id' => $client->id,

        ]);

        // Redirect the user to a page with a success message
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = intval($request->id);

        Appointment::find($id)->delete();

        session()->flash('delete','تم حذف القسم بنجاح');

        return redirect()->back();
    }



}
