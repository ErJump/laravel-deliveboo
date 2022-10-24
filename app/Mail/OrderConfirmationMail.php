<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $userData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userData)
    {
        $this->userData = $userData;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->view('emails.orderConfirmation')->with([
            'name' => $this->userData['name'],
            'surname' => $this->userData['surname'],
            'address' => $this->userData['address'],
            'email' => $this->userData['email'],
            'amount' => $this->userData['amount'],
            'order' => $this->userData['order']
        ]);
    }
}
