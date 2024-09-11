<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AdminPasswordResetNotification extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function toMail($notifiable)
    {
        $resetUrl = url(route('admin.password.reset', $this->token, false));

        return (new MailMessage)
            ->view('admin.auth.emails.reset', [
                'user' => $notifiable,
                'resetUrl' => $resetUrl
            ])
            ->subject('Password Reset Request');
    }
}
