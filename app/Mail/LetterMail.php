<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LetterMail extends Mailable
{
    use Queueable, SerializesModels;


	public $data;

    /**
     * Create a new message instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.feedback')
            ->from($this->data['email'], $this->data['name'])
            ->to(env('MAIL_ADMIN'))
            ->cc(env('MAIL_USER_1'))
            ->bcc(env('MAIL_USER_2'))
            ->subject('Сообщение от пользователя');
    }
}
