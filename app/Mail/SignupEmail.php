<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignupEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email_data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        //dd($data);
        $this->email_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email_data = $this->email_data;
        return 
        $this->from(env('MAIL_USERNAME'),'Hachitech solution')
        ->subject("Welcome to Hachitech solution")
        ->view('auth.email.email-verify',compact('email_data'));
    }
}