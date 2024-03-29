<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use App\Models\InvoiceAttachment;
use App\Models\InvoiceDetail;
use App\Models\Section;
use App\Models\User;
use App\Notifications\AppointmentCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Notifications\AppointmentNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

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

    /**
     * Show the list of appointments in the backend.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAppointments()
    {

        // Get the last appointment with its associated client and doctor.
        $appointment = Appointment::latest()->first();

        $doctor = $appointment->doctor;
        $client = $appointment->client;

        // You can pass data to the appointments list view here, such as the last appointment, doctor, and client.
        return view('appointment.index',compact('appointment', 'doctor', 'client'));
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
public function addInvoice($id)
{
    $appointment = Appointment::find($id);
    $services =  $appointment->services;


    return view('invoice.new_invoice', [
        'client_id' => $appointment->client_id,
        'section_id' => $appointment->section_id,

    ])->with('appointment',$appointment);


}
public function Invoicestore(Request $request)
{
    $validatedData = $request->validate([
        'invoice_number' => 'required',
        'invoice_date' => 'required',
        'due_date' => 'required',
        'client_id' => 'required',
        'section_id' => 'required',
        'services' => 'array|required',
   'services.*' => 'integer',
        'amount_collection' => 'required',
        'discount' => 'required',
        'rate_vat' => 'required',
        'value_vat' => 'required',
        'total' => 'required',

        'note' => 'nullable|string',


        'attached_files.*' => 'nullable|mimes:pdf,jpeg,jpg,png|max:2048',
    ]);


    $invoice = new Invoice();
    $invoice->invoice_number = $validatedData['invoice_number'];
    $invoice->invoice_date = $validatedData['invoice_date'];
    $invoice->due_date = $validatedData['due_date'];
    $invoice->client_id = $validatedData['client_id'];
    $invoice->section_id = $validatedData['section_id'];

    $invoice->amount_collection = $validatedData['amount_collection'];
    $invoice->discount = $validatedData['discount'];
    $invoice->rate_vat = $validatedData['rate_vat'];
    $invoice->value_vat = $validatedData['value_vat'];
    $invoice->total = $validatedData['total'];

    $invoice->note = $validatedData['note'];
    $invoice->created_by = Auth::id();


    $invoice->save();
    $invoice_id = $invoice->id;

    $invoice->services()->attach($validatedData['services'], ['section_id' => $validatedData['section_id']]);

    $invoice_details = new InvoiceDetail();
    $invoice_details->invoice_id = $invoice_id;
    $invoice_details->note = $validatedData['note'];
    $invoice_details->user_id = Auth::id();
    $invoice->value_vat = $validatedData['value_vat'];
    $invoice_details->save();

// Create a folder for the invoice
$folderName = 'invoices/' . $invoice->invoice_number;
Storage::makeDirectory($folderName);

// Handle file upload and update attached_files column
if ($request->hasFile('attached_files')) {
   foreach ($request->attached_files as $file) {
       $filename = time() . '-' . $file->getClientOriginalName();
       $file->move(public_path('storage/' . $folderName), $filename);
       $attachment = new InvoiceAttachment();
       $attachment->invoice_id = $invoice->id;
       $attachment->filename = $filename;
       $attachment->fileinfo =  $request->fileinfo;
       $attachment->user_id = Auth::id();

       $attachment->save();
   }
}
if ($request->has('appointment_id')) {
    $appointment = Appointment::findOrFail($request->appointment_id);
    $appointment->invoice_id = $invoice->id;
    $appointment->save();
}
return redirect()->route('invoices.index')->with('success', 'Invoice created successfully!');
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
        $appointment = Appointment::findOrFail($request->id);
        $appointment->apt_datetime = $request->input('apt_datetime');
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->remarks = $request->input('remarks');

        // Check if the remarks field is not empty
        if (!empty($appointment->remarks)) {
            $appointment->status = 'processing';
            $doctor = Doctor::find($appointment->doctor_id);
            Notification::send($doctor, new AppointmentCreated($appointment));
              // Create a new event
              $event = new Event();
              $event->doctor_id = $appointment->doctor_id;
              $event->client_id = $appointment->client_id;
              $event->start_datetime = $appointment->remarks;
               $event->save();

        }

        $appointment->edited_by = Auth::id();
        $appointment->save();
        session()->flash('edit','تم التعديل بنجاح');
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

        // Get the selected doctor and their section ID
        $doctor = Doctor::findOrFail($validatedData['doctor_id']);
        $section_id = $doctor->section->id;

        // Create the client.
        $client = Client::create([
            'client_name' => $validatedData['client_name'],
            'client_phone' => $validatedData['client_phone'],
        ]);

        // Create the appointment.
        $appointment = Appointment::create([
            'doctor_id' => $validatedData['doctor_id'],
            'section_id' => $section_id,
            'apt_datetime' => $validatedData['apt_datetime'],
            'client_id' => $client->id,
        ]);


        session()->flash('Add','تم إضافة الحجز بنجاح');
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
    $id = $request->input('id');

    $appointment = Appointment::find($id);

    if (!$appointment) {
        return redirect()->back()->with('error', 'Appointment not found');
    }

    // Delete the associated services
    $appointment->services()->detach();
   // Delete the appointment
   $appointment->delete();
    session()->flash('delete','تم حذف    الحجز بنجاح');
    return redirect()->back();
}




}
