<?php

namespace App\Notifications;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
class VerifyEmail extends VerifyEmailNotification
{
   /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
     public static $toMailCallback;

/**
 * Get the notification's channels.
 *
 * @param  mixed  $notifiable
 * @return array|string
 */
public function via($notifiable)
{
    return ['mail'];
}

/**
 * Build the mail representation of the notification.
 *
 * @param  mixed  $notifiable
 * @return \Illuminate\Notifications\Messages\MailMessage
 */
public function toMail($notifiable)
{
    $verificationUrl = $this->verificationUrl($notifiable);

    if (static::$toMailCallback) {
        return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
    }

    return (new MailMessage)
        ->subject("Confirmation de l'adresse email")
        ->greeting('Bonjour')
        ->subject(Lang::get('Vérifier l\'adresse e-mail'))
        ->line(Lang::get('Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse e-mail.'))
        ->action(Lang::get('Vérifier l\'adresse e-mail'), $verificationUrl)
        ->line(Lang::get('Si vous n\'avez pas créé de compte, aucune autre action n\'est requise.'));
}

/**
 * Get the verification URL for the given notifiable.
 *
 * @param  mixed  $notifiable
 * @return string
 */

/*protected function verificationUrl($notifiable)
{
    return URL::temporarySignedRoute(
        'verification.verify',
        Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
        [
            'id' => $notifiable->getKey(),
            'hash' => sha1($notifiable->getEmailForVerification()),
        ]
    );
}
*/

protected function verificationUrl($user)
{
    return URL::temporarySignedRoute(
        'verification.verify',
        Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
        [
            'id' => $user->getKey(),
            'hash' => sha1($user->email),
        ]
    );
}

/**
 * Set a callback that should be used when building the notification mail message.
 *
 * @param  \Closure  $callback
 * @return void
 */
public static function toMailUsing($callback)
{
    static::$toMailCallback = $callback;
}
}
