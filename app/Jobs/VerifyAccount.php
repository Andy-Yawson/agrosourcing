<?php

namespace App\Jobs;

use App\Mail\RegisterMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class VerifyAccount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private $token;
    /**
     * @var string
     */
    private $name;
    private $email;

    /**
     * Create a new job instance.
     *
     * @param string $token
     * @param string $name
     * @param string $email
     */
    public function __construct(string $token, string $name, string $email)
    {
        //
        $this->token = $token;
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new RegisterMail($this->token,$this->name));
    }
}
