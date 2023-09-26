<?php

namespace App\Mail\Auth;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * @param User $user
     */

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Sign up confirmation')
            ->view('emails.verify');
    }
}
