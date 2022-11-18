<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyEmail extends VerifyEmailBase
{
    //    use Queueable;

    // change as you want
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }
        return (new MailMessage)
            ->subject(Lang::get('Verificar correo electrónico'))
            ->line(Lang::get('Por favor, has click en el botón para verificar tu correo electrónico.'))
            ->action(
                Lang::get('Verificar correo electrónico'),
                $this->verificationUrl($notifiable)
            )
            ->line(Lang::get('Si no create una cuetna, no se requiere ninguna acción.'));
    }
}
