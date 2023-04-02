<?php
namespace App\Events;

use DateTime;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewAppointment implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $appointment;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    public function broadcastOn()
    {
        return ['appointment.' . $this->appointment->id];
    }
    public function broadcastWith()
{



    $appointmentDate = DateTime::createFromFormat('Y-m-d H:i:s', $this->appointment->apt_datetime);
    $data = [
        'appointment_id' => $this->appointment->id,
        'client_name' => $this->appointment->client->name,
        'appointment_date' => $appointmentDate->format('d-m-Y h:i A'),
        'doctor_name' => $this->appointment->doctor->name ?? null,
    ];

}

}
