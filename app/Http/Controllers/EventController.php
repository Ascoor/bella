<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Client;
use App\Models\Event;

class EventController extends Controller
{
public function index(Request $request)
{
    $doctor_id = $request->input('doctor_id');
    $client_id = $request->input('client_id');

    if ($doctor_id) {
        $doctor = Doctor::findOrFail($doctor_id);
        $events = $doctor->events()->with('client')->get();
    } elseif ($client_id) {
        $client = Client::findOrFail($client_id);
        $events = $client->events()->with('doctor')->get();
    } else {
        $events = Event::with(['doctor', 'client'])->get();
    }

    // Return the events data as JSON
    return response()->json(['events' => $events]);
}

}

