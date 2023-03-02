<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentCreated extends Notification implements  ShouldQueue
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
            'doctor_name' => $this->appointment->doctor->name,
            'client_name' => $this->appointment->client->client_name,
            'appointment_date' => $this->appointment->apt_date,
            'appointment_time' => $this->appointment->apt_time,
        ];
    }
    public function via($notifiable)
    {
        return ['database'];
    }


        public function toDatabase($notifiable)
        {
            $url = route('notifications.markAsRead', [
                'id' => $this->id
            ]);

            return [
                'appointment_id' => $this->appointment->id,
                'appointment_date' => $this->appointment->apt_date,
                'appointment_time' => $this->appointment->apt_time,
                'client_name' => $this->appointment->client->client_name,
                'read_url' => $url
            ];
        }
}
