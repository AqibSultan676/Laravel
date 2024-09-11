<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPassword extends Notification
{
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Determine which channels the notification will be sent on.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail']; // Indicates that the notification should be sent via email
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url(route('admin.password.reset', $this->token, false));

        return (new MailMessage)
            ->subject('Password Reset Request')
            ->view('admin.auth.emails.reset', ['resetUrl' => $url, 'user' => $notifiable]);
    }
}
