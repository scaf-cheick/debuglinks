<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class NewCommentNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($item, $isReply)
    {
        $this->item = $item;
        $this->isReply = $isReply;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if($this->isReply){
            return (new MailMessage)
                ->subject("Debuglinks, nouveau commentaire")
                ->greeting('Bonjour!')
                ->line('Vous avez reçu une reponse à votre commentaire sur le thread intitulé : '. $this->item->subject )
                ->line('Merci de vous connectez afin de voir plus de détails...')
                ->action(Lang::get('Consulter le commentaire'), url('/') . '/threads/' . $this->item->slug);
        }
        else{
            return (new MailMessage)
                ->subject("Debuglinks, nouveau commentaire")
                ->greeting('Bonjour!')
                ->line('Vous avez reçu un nouveau commentaire sur votre thread intitulé : '. $this->item->subject )
                ->line('Merci de vous connectez afin de voir plus de détails...')
                ->action(Lang::get('Consulter le commentaire'), url('/') . '/threads/'. $this->item->slug);
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
