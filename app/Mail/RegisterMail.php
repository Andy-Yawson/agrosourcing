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

    public $token,$name,$email;

    /**
     * Create a new message instance.
     *
     * @param $token
     * @param $name
     * @param $email
     */
    public function __construct($token,$name,$email)
    {
        $this->token = $token;
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     *
     */
    public function build()
    {
        return $this->to($this->email)
            ->view('emails.new-user')
            ->with([
                'url' => url('/verify/token/'.$this->token),
                'name' => $this->name
            ]);
    }
}
