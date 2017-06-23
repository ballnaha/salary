<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use DB;

class Sendmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    
    public function build()
    {   

        // $address = 'thanya@poonsub.local';
        // $name = 'IT';
        // $subject = 'NC Raw Material Workflow';

        // return $this->view('emails.incemail')
        //         ->from($address, $name)
        //         ->cc($address, $name)
        //         //->bcc($address, $name)
        //         ->replyTo($address, $name)
        //         ->subject($subject);
    }
}
