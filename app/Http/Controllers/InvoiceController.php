<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Invoice_details;
use App\Models\InvoiceAttachment;
use App\Models\InvoiceDetail;
use App\Models\Service;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use InvoiceAttachments;

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

        $invoice_details = Invoice_details::where('invoice_id', $id)->firstOrFail();
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
                $attachment->save();
            }
        }
        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully!');
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
            $attachment->save();
        }

        return redirect()->back();
    }

}
