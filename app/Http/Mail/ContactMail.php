<?php
/**
 * @author Stefan Izdrail
 **/


namespace App\Http\Mail;

use Illuminate\Mail\Mailable;

class ContactMail extends Mailable
{
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orders.shipped');
    }
}
