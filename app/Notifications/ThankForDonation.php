<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ThankForDonation extends Notification
{
    use Queueable;
    public $donor;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($donor)
    {
        $this->donor = $donor;
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
        return (new MailMessage)
        ->from('info@brighterlives.cm', __('BrighterLives.cm'))
        ->subject('BrighterLives Thanks For Your Donation')
        ->markdown('mail.donation.thanks', ['donor' => $this->donor]);
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
