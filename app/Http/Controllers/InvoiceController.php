<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Invoice_detail;
use App\Models\Invoice_service;
use App\Models\Invoice_attachment;
use App\Models\Invoice_details;
use App\Models\Service;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

$section =Service::with('section');
    return view('Invoice.add_invoice',compact('section'))->with('clients',$clients);
}


    /**
     * Store a newly created invoice in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = new Invoice;
        $invoice->invoice_number = $request->invoice_number;
        $invoice->invoice_date = $request->invoice_date;
        $invoice->due_date = $request->due_date;
        $invoice->amount_collection = 0;
        $invoice->discount = $request->discount;
        $invoice->value_vat = $request->value_vat;
        $invoice->total = 0;
        $invoice->status = 'pending';
        $invoice->save();

        foreach ($request->services as $serviceData) {
            $service = Service::find($serviceData['id']);
            $servicePrice = $service->price;
            $Invoice_service = new Invoice_service;
            $Invoice_service->invoice_id = $invoice->id;
            $Invoice_service->service_id = $service->id;
            $Invoice_service->section_id = $service->section_id;
            $Invoice_service->quantity = $serviceData['quantity'];
            $Invoice_service->price = $servicePrice;
            $Invoice_service->save();
            $invoice->amount_collection += $servicePrice * $serviceData['quantity'];
        }

        $invoice->amount_collection -= $invoice->discount;

        if ($invoice->value_vat) {
            $vatAmount = ($invoice->amount_collection * $invoice->value_vat) / 100;
            $invoice->rate_vat = $invoice->value_vat;
            $invoice->amount_vat = $vatAmount;
            $invoice->total = $invoice->amount_collection + $vatAmount;
        } else {
            $invoice->total = $invoice->amount_collection;
        }

        $invoice->save();

        $invoiceDetails = new Invoice_details();
        $invoiceDetails->invoice_id = $invoice->id;
        $invoiceDetails->status = 'pending';
        $invoiceDetails->value_status = 0;
        $invoiceDetails->user = auth()->user()->name;
        $invoiceDetails->save();

        if ($request->hasFile('attachment')) {
            $files = $request->file('attachment');
            $attachedFiles = [];
            foreach ($files as $file) {
                $path = $file->store('public/invoice_attachments');
                $attachedFiles[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                ];
            }

            $invoiceAttachments = new Invoice_attachment();
            $invoiceAttachments->invoice_id = $invoice->id;
            $invoiceAttachments->attached_files = json_encode($attachedFiles);
            $invoiceAttachments->created_by = auth()->user()->id;
            $invoiceAttachments->save();
        }

        return response()->json(['message' => 'Invoice created successfully.'], 201);
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
