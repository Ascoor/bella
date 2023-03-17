<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class ClientController extends Controller
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
        $clients = Client::all();
        return view('client.index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'client_name' => 'required',
        'client_phone' => 'required',
    ]);

    $client = Client::create([
        'client_name' => $request->client_name,
        'email' => $request->email,
        'client_phone' => $request->client_phone,
        'note' => $request->note,
        'address' => $request->address,
        'pid' => $request->pid,
        'gender' => $request->gender,
        'birthdate' => $request->birthdate,
    ]);

    session()->flash('Add','تم إضافة العميل بنجاح');
    return redirect()->back();

}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */public function update(Request $request, $id)
{        $id = $request->input('id');
    $client = Client::find($id);
    $client->update($request->all());


    session()->flash('edit','تم تحديث بيانات العميل بنجاح');
    return redirect()->back();
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
public function destroy(Request $request)
{
$id = intval($request->id);

Client::find($id)->delete();

session()->flash('delete','تم حذف العميل بنجاح');

return redirect()->back();
}
}
