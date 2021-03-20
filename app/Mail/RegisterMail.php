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
        return (new MailMessage())
            ->line('New user account activation')
            ->line('Hello '.$this->name . ',')
            ->line('You are receiving this email to activate your account.')
            ->action('Activate account',url('/verify/token/'.$this->token))
            ->line('Thank you for using our application!');
         //$this->view('mail.register')->with(['token'=>$this->token, 'name'=>$this->name]);
    }
}
