<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DataEntryRegister extends Mailable
{
    use Queueable, SerializesModels;

    private $name,$password;
    /**
     * Create a new message instance.
     *
     * @param $name
     * @param $password
     */
    public function __construct($name, $password)
    {
        $this->name = $name;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.entry-user',['name'=>$this->name,'password'=>$this->password]);
    }
}
