<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    // Get all clients
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', ['clients' => $clients]);
    }

    // Show the form for creating a new client
    public function create()
    {
        return view('clients.create');
    }

    // Store a newly created client in storage
    public function store(Request $request)
    {
        $client = new Client;
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->phone = $request->input('phone');
        $client->save();
        return redirect()->route('clients.index')->with('success', 'Client created successfully');
    }

    // Show the form for editing the specified client
    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', ['client' => $client]);
    }

    // Update the specified client in storage
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->phone = $request->input('phone');
        $client->save();
        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    }

    // Remove the specified client from storage
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully');
    }
}
