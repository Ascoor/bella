<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;

use App\Models\InvoiceService;

use App\Models\InvoiceDetail;
use App\Models\InvoiceAttachment;
use App\Models\Service;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the invoices.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with('section', 'client', 'invoice_details')->get();
        return view('invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new invoice.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $clients = Client::all();

$sections =Section::all();
    return view('Invoice.add_invoice')->with('clients',$clients)->with('sections',$sections);
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
             'client_id' => 'required|exists:clients,id',
             'section' => 'required|exists:sections,id',
             'services' => 'required|array',
             'amount_collection' => 'required|numeric|min:0',
             'discount' => 'required|numeric|min:0',
             'rate_vat' => 'required|numeric|min:0',
             'value_vat' => 'required|numeric|min:0',
             'total' => 'required|numeric|min:0',
             'note' => 'nullable|string',
             'attached.*' => 'nullable|mimes:pdf,jpeg,jpg,png|max:2048',
         ]);

         $invoice = new Invoice();
         $invoice->invoice_number = $validatedData['invoice_number'];
         $invoice->invoice_date = $validatedData['invoice_date'];
         $invoice->due_date = $validatedData['due_date'];
         $invoice->client_id = $validatedData['client_id'];

         $invoice->amount_collection = $validatedData['amount_collection'];
         $invoice->discount = $validatedData['discount'];
         $invoice->rate_vat = $validatedData['rate_vat'];
         $invoice->value_vat = $validatedData['value_vat'];
         $invoice->total = $validatedData['total'];
         $invoice->note = $validatedData['note'];
         $invoice->created_by = Auth::id();

         $invoice->save();

// Attach services to the invoice
$invoice->services()->attach($validatedData['services'], ['section_id' => $validatedData['section']]);


         // Handle file upload
         if ($request->hasFile('attached')) {
             foreach ($request->file('attached') as $file) {
                 $path = $file->store('public/attachments');
                 $invoice->attachments()->create(['file_path' => $path]);
             }
         }

         return redirect()->route('invoices.index')->with('success', 'Invoice created successfully!');
     }



    public function update(Request $request, $id)
{
    $invoice = Invoice::findOrFail($id);
    $invoice->update($request->all());

    // Update the invoice services
    $Invoice_services = $invoice->Invoice_services;
    foreach ($Invoice_services as $Invoice_service) {
        $serviceData = collect($request->services)->firstWhere('id', $Invoice_service->service_id);
        if ($serviceData) {
            $service = Service::find($serviceData['id']);
            $servicePrice = $service->price;
            $Invoice_service->quantity = $serviceData['quantity'];
            $Invoice_service->price = $servicePrice;
            $Invoice_service->save();
            $invoice->amount_collection += $servicePrice * $serviceData['quantity'];
        }
    }

    // Update the amount collection
    $invoice->amount_collection -= $invoice->discount;
    $invoice->total = $invoice->amount_collection + ($invoice->amount_collection * $invoice->value_vat);
    $invoice->save();

    return response()->json(['message' => 'Invoice updated successfully', 'invoice' => $invoice]);
}
public function getservices($section_id)
{

    $services = DB::table('services')->where('section_id', $section_id)->get();
    return response()->json($services);
    return json_encode($services);
}
public function delete($id)
{
    $invoice = Invoice::findOrFail($id);
    $invoice->delete();

    return response()->json(['message' => 'Invoice deleted successfully']);
}

public function show($id)
{
    $invoice = Invoice::findOrFail($id);

    return response()->json(['invoice' => $invoice->load(['client', 'Invoice_services', 'invoiceDetails', 'invoiceAttachments', 'createdBy'])]);
}
public function softDelete(Request $request, $id)
{
    $invoice = Invoice::findOrFail($id);
    $invoice->delete();

    return response()->json([
        'message' => 'Invoice has been soft deleted.',
        'data' => $invoice
    ]);
}
public function restore(Request $request, $id)
{
    $invoice = Invoice::withTrashed()->findOrFail($id);
    $invoice->restore();

    return response()->json([
        'message' => 'Invoice has been restored.',
        'data' => $invoice
    ]);
}

public function forceDelete(Request $request, $id)
{
    $invoice = Invoice::withTrashed()->findOrFail($id);
    $invoice->forceDelete();

    return response()->json([
        'message' => 'Invoice has been permanently deleted.',
        'data' => $invoice
    ]);
}
}
