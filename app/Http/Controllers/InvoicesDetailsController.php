<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Invoice_details;
use App\Models\InvoiceAttachment;
use App\Models\InvoiceDetail;

class InvoicesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice_details = Invoice_details::all();
        return view('invoice.details_invoice')->with('invoice_details',$invoice_details);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $invoice = Invoice::where('id',$id)->first();
        $details  = InvoiceDetail::where('invoice_id',$id)->get();
        $attachments  = InvoiceAttachment::where('invoice_id',$id)->get();

        return view('invoice.details_invoice',compact('invoice','details','attachments'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }



    public function download($invoice_number, $filename)
        {
            $attachmentPath = storage_path("app/public/invoices/$invoice_number/$filename");
            return response()->download($attachmentPath);
        }

        public function view($invoice_number, $filename)
        {
            $attachmentPath = storage_path("app/public/invoices/$invoice_number/$filename");
            return response()->file($attachmentPath);
        }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
