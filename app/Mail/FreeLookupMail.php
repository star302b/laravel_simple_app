<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FreeLookupMail extends Mailable
{
    use Queueable, SerializesModels;

    public $form_data;
    public $ip_address;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form_data,$ip_address)
    {
        $this->form_data = $form_data;
        $this->ip_address = $ip_address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('service@usacorpinc.com','USACORP')->subject('Free Lookup')->view('emails.admin.free_lookup_request');
    }
}
