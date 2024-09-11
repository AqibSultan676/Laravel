<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class UserRegistrationNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.admin_registration')
                    ->with([
                        'username' => $this->user->username,
                        'email' => $this->user->email,
                        'userId' => $this->user->id, // Added userId to pass to the view
                    ]);
    }
}
