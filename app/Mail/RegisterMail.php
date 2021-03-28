<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    private $token,$name;

    /**
     * Create a new message instance.
     *
     * @param $token
     * @param $name
     */
    public function __construct($token,$name)
    {
        $this->token = $token;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     *
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->view('emails.new-user')
            ->with([
                'url' => url('/verify/token/'.$this->token),
                'name' => $this->name
            ]);
    }
}
