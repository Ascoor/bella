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
        $invoices = Invoice::with('servicesWithSections')->get();

        return view('Invoice.index', compact('invoices'));
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
             'services' => 'required|array|exists:services,id',
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
         $invoice->section_id = $validatedData['section_id'];

         $invoice->amount_collection = $validatedData['amount_collection'];
         $invoice->discount = $validatedData['discount'];
         $invoice->rate_vat = $validatedData['rate_vat'];
         $invoice->value_vat = $validatedData['value_vat'];
         $invoice->total = $validatedData['total'];
         $invoice->note = $validatedData['note'];
         $invoice->created_by = Auth::id();
         $invoice->status = 'غير مدفوعة';
         $invoice->value_status = 2;

         $invoice->save();

         // Attach services to the invoice
     // Attach services to the invoice
     $invoice->services()->attach($validatedData['services'], ['section_id' => $validatedData['section_id']]);




         // Handle file upload
         if ($request->hasFile('attached')) {
             foreach ($request->file('attached') as $file) {
                 $path = $file->store('public/attachments');
                 $invoice->attachments()->create(['file_path' => $path]);
             }
         }

         return redirect()->route('invoices.index')->with('success', 'Invoice created successfully!');
     }


    /**
     * Display the specified invoice.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $clients = Client::all();
        $services = Service::all();
        $sections = Section::all();

        return view('invoices.edit', compact('invoice', 'clients', 'services', 'sections'));
    }

    }
