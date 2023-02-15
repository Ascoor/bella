<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Symfony\Polyfill\Intl\Idn\Idn;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::latest()->paginate(50);
        $services = Service::all();
        $doctors = Doctor::all();
        // $custumers = Client::all();
        return view('appointment.index',compact('appointments', $appointments))->with('services', $services)->with('doctor', $doctors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $services = Service::all();
        $clients = Client::all();
        $doctors = Doctor::all();
        return view('appointment.create')->with('clients', $clients)->with('doctors',$doctors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $apt_number = Str::random(5);

            $appointment = Appointment::create([
                'apt_number'=>$apt_number,
                'doctor_name' => $request->doctor_id,
                'name' => $request->client_id,
                'user_id' =>Auth::id(),
                'phone' => $request->phone,
                'apt_date' => $request->apt_date,
                'apt_time' => $request->apt_time

            ]);
            $appointment->service()->attach($request->services);



            return redirect()->route('appointments.index')->with('تمت', 'تم الإضافة  بنجاح');
        }

    public function clientstore(Request $request)
    {

        $apt_number = Str::random(15);
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'doctor_id' => 'required|string|max:255',
            'appointment_time' => 'required|date',
        ]);

        $client = Client::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
        ]);

        $appointment = Appointment::create([
            'client_id' => $client->id,
            'service' => $request->service,
            'appointment_time' => $request->appointment_time,
            'status' => 'pending',
        ]);

        // Mail::to('admin@example.com')->send(new Appointment($appointment));

        return redirect()->route('thanks');
    }


       // Send the notifications
        // Send the notifications
    // $users = User::all();
    // Notification::send( $users,new AppointmentNotification($appointment));





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show($id)


        {
            $appointment = Appointment::where('id', $id)->first();
            $services = Service::all();
            $doctors = Doctor::all();

            return view('appointment.show')
            ->with('appointment', $appointment)->with('services', $services)->with('doctors', $doctors);
        }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::find($id);
        $doctors = Doctor::all();
        $services = Service::all();
        return view('appointment.edit')->with('appointment', $appointment)
        ->with('services', $services)->with('doctors', $doctors);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, appointment $appointment)
    {
            // Update the appointment
            $appointment->update($request->all());
            $appointment->service()->sync($request->services);
            $appointment->doctor()->sync($request->doctor);
            // Check if the status is accepted
            if ($appointment->status == 'complete') {

                // Create the invoice
                $invoice = Invoice::create([

                    'user_id' => Auth::id(),
                    'client_id' =>$appointment->name,
                    'services' =>$request->service,
                    'doctor' =>$request->doctor,
                    'amount' => $appointment->amount,
                    'discount' => $request->discount,
                ]);
            }


            return redirect()->route('appointments.index')->with('Done', 'Updated Success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(appointment $appointment)
    {
        //
    }
}
