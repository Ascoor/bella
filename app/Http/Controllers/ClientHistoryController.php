<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientHistory;
use Illuminate\Http\Request;

class ClientHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientHistories = ClientHistory::all();

        return view('client.client-history', compact('clientHistories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client-history.create');
    }
public function getClientInfo($clientId)
{
    $client = Client::find($clientId);

    if (!$client) {
        abort(404, 'Client not found');
    }

    return view('client.details_client', ['client' => $client]);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required',
            'description' => 'required',
            'date' => 'required|date',
        ]);

        $clientHistory = new ClientHistory();
        $clientHistory->client_id = $validatedData['client_id'];
        $clientHistory->description = $validatedData['description'];
        $clientHistory->date = $validatedData['date'];
        $clientHistory->save();

        return redirect()->route('client-history.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientHistory = ClientHistory::find($id);

        return view('client-history.edit', compact('clientHistory'));
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
        $validatedData = $request->validate([
            'client_id' => 'required',
            'description' => 'required',
            'date' => 'required|date',
        ]);

        $clientHistory = ClientHistory::find($id);
        $clientHistory->client_id = $validatedData['client_id'];
        $clientHistory->description = $validatedData['description'];
        $clientHistory->date = $validatedData['date'];
        $clientHistory->save();

        return redirect()->route('client-history.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientHistory = ClientHistory::find($id);
        $clientHistory->delete();

        return redirect()->route('client-history.index');
    }

}
