<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscribesEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subs;

    /**
     * Create a new message instance.
     *
     * @param $subscriber
     */
    public function __construct($subscriber)
    {
        $this->subs = $subscriber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Signup Confirmation')
            ->markdown('emails.subscribers.register.verify');
    }
}
