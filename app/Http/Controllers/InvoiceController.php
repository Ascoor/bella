<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientHistory;
use App\Models\ClientHistoryInvoice;
use App\Models\Invoice;
use App\Models\Invoice_details;
use App\Models\InvoiceAttachment;
use App\Models\InvoiceDetail;
use App\Models\Revenue;
use App\Models\Service;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use InvoiceAttachments;
use InvoiceDetails;

class InvoiceController extends Controller
{

    /**
     * Display a listing of the invoices.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $invoices = Invoice::with('services')->get();
$services = Service::all();
        return view('invoice.index', compact('invoices'))->with('services',$services);
    }


    public function create()
    {
        $clients = Client::all();
        $services = Service::all();
        $sections = Section::all();

        return view('invoice.add_invoice', compact('clients', 'services', 'sections'));
    }



    /**
     * Store a newly created invoice in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function store(Request $request)
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
            $attachment->fileinfo = $request->fileinfo;
            $attachment->user_id = Auth::id();
            $attachment->save();
        }
    }

    return redirect()->route('invoices.index')->with('success', 'Invoice created successfully!');
}



public function edit($id)
{
    $clients = Client::all();
    $services = Service::all();
    $sections = Section::all();
$invoice =  Invoice::find($id);
    return view('invoice.edit_invoice', compact('invoice', 'clients', 'services', 'sections'));
}
    /**
     * Display the specified invoice.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        $invoice = Invoice::findOrFail($id);
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

        $invoice->save();

        $invoice->services()->sync($validatedData['services'], ['section_id' => $validatedData['section_id']]);

        $invoice_details = InvoiceDetail::where('invoice_id', $id)->firstOrFail();
        $invoice_details->note = $validatedData['note'];
        $invoice_details->user_id = Auth::id();
        $invoice_details->save();

        // Create a folder for the invoice if it doesn't exist
        $folderName = 'invoices/' . $invoice->invoice_number;
        Storage::makeDirectory($folderName);

        // Handle file attachments
        if ($request->hasFile('attached_files')) {
            foreach ($request->attached_files as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path('storage/' . $folderName), $filename);
                $attachment = new InvoiceAttachment();
                $attachment->invoice_id = $invoice->id;
                $attachment->filename = $filename;
                $attachment->fileinfo = $request->fileinfo;
                $attachment->user_id = Auth::id();
                $attachment->save();
            }
        }
        return redirect()->back()->with('success', 'Invoice created successfully!');
    }

    public function show($id)
    {
        $invoice = invoice::where('id', $id)->first();
        return view('invoice.status_update', compact('invoice'));
    }


    public function statusUpdate($id, Request $request)
    {
        $invoice = Invoice::findOrFail($id);

        $validatedData = $request->validate([
            'invoice_id' => 'required',
            'payment_amount' => 'required'
        ]);

        $payment_amount = $request->payment_amount;

        // Calculate the new amount paid
        $new_amount_paid = $invoice->total_amount + $payment_amount;

        // Check if new amount paid is greater than or equal to the invoice total
        if ($new_amount_paid > $invoice->total) {
            return redirect()->back()->withErrors(['total_amount' => 'The total amount paid must be greater than or equal to the invoice total.']);
        }

        // Check if the new amount paid is less than the invoice total
        if ($new_amount_paid < $invoice->total) {
            $invoice->status = 'مسدده جزئياً';
            $invoice->value_status = 3;
        }
        // Check if the new amount paid is equal to the invoice total
        else if ($new_amount_paid == $invoice->total) {
            $invoice->status = 'تم السداد';
            $invoice->value_status = 1;
        }

        $invoice->total_amount = $new_amount_paid;
        $invoice->save();

        $invoiceDetail = InvoiceDetail::create([
            'invoice_id' => $request->invoice_id,
            'status' => $invoice->status,
            'value_status' => $invoice->value_status,
            'payment_amount' => $request->payment_amount,
            'note' => $request->note,
            'payment_date' => $request->payment_date,
            'user_id' => Auth::id(),
        ]);

        // Create a new revenue row
        $revenue = new Revenue();
        $revenue->revenue_date = $request->payment_date;
        $revenue->revenue_value = $request->payment_amount;
        $revenue->revenue_from = $invoice->client->client_name;
        $revenue->revenue_notes = $invoiceDetail->note;
        $revenue->add_id = Auth::id();
        $revenue->income_type_id = 1; // Assuming the income type id for 'فاتورة' is 1
        $revenue->save();
        if ($new_amount_paid == $invoice->total) {
            $invoice->status = 'تم السداد';
            $invoice->value_status = 1;

            // Create a new client history invoice record
            $clientHistoryInvoice = new ClientHistoryInvoice();
            $clientHistoryInvoice->client_id = $invoice->client->id;
            $clientHistoryInvoice->invoice_id = $invoice->id;
            $clientHistoryInvoice->amount = $invoice->total;
            $clientHistoryInvoice->save();
        }


        session()->flash('status_update');
        return redirect('/invoices');
    }

    public function addAttachments(Request $request)
    {
        $this->validate($request, [
            'filename' => 'mimes:pdf,jpeg,png,jpg',
        ], [
            'filename.mimes' => 'صيغة المرفق يجب ان تكون pdf, jpeg, png, jpg',
        ]);

        // Retrieve existing attachments
        $attachments = InvoiceAttachment::where('invoice_id', $request->invoice_id)->get();

        // Upload and save new attachments
        $folderName = 'invoices/' . $request->invoice_number;
        Storage::makeDirectory($folderName);
        if ($request->hasFile('filename')) {
            $file = $request->file('filename');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('storage/' . $folderName), $filename);
            $attachment = new InvoiceAttachment();
            $attachment->invoice_id = $request->invoice_id;
            $attachment->filename = $filename;
            $attachment->fileinfo = $request->fileinfo;
            $attachment->user_id = Auth::id();
            $attachment->save();
        }

        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $id = $request->input('invoice_id');

        $invoice = Invoice::find($id);

        if ($invoice) {
            // Delete the attached files from storage
            foreach ($invoice->attachments as $attachment) {
                Storage::delete('invoices/' . $invoice->invoice_number . '/' . $attachment->filename);
                $attachment->delete();
            }

            // Delete the invoice details
            $invoice->invoice_detail()->delete();

            // Delete the invoice
            $invoice->delete();

            return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Invoice not found!');
        }
    }

    public function sort(Request $request)
    {
        $value_status = $request->query('value_status');

        $invoices = Invoice::query();


        if ($value_status) {
            $invoices->where('value_status', $value_status);

        }
        $invoices = $invoices->orderBy('value_status')->get();

        return view('invoice.index', [
            'invoices' => $invoices,
        ]);
        }

}
