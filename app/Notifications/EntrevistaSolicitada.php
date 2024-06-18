<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EntrevistaSolicitada extends Notification implements ShouldQueue
{
    use Queueable;

    protected $entrevista;

    public function __construct($entrevista)
    {
        $this->entrevista = $entrevista;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Se ha solicitado una nueva entrevista.')
                    ->action('Ver Entrevista', url('/entrevistas/' . $this->entrevista->id))
                    ->line('Gracias por usar nuestra aplicación!');
    }

    public function toArray($notifiable)
    {
        return [
            'entrevista_id' => $this->entrevista->id,
            'message' => 'Se ha solicitado una nueva entrevista.',
        ];
    }
}
