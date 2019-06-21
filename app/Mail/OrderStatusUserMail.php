<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderStatusUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $form_data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form_data)
    {
        $this->form_data = $form_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('service@usacorpinc.com','USACORP')->subject('Your Order Status Request')->view('emails.user.status');
    }
}
