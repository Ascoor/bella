<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AppointmentNotification extends Notification
{
    use Queueable;

    protected $appointment;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }
    public function toArray($notifiable)
    {
        return [
            'appointment_id' => $this->appointment->id,
            'appointment_date' => $this->appointment->apt_date,
            'appointment_time' => $this->appointment->apt_time,
            'client_name' => $this->appointment->client->name,
        ];
    }

    public function toAppointment($notifiable)
    {
        return [
            'appointment_id' => $this->appointment->id,
            'appointment_date' => $this->appointment->apt_date,
            'appointment_time' => $this->appointment->apt_time,
            'client_name' => $this->appointment->client->name,
        ];
    }
}
