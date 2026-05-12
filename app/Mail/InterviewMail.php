<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class InterviewMail extends Mailable
{
    public $link;

    public function __construct($link)
    {
        $this->link = $link;
    }

    public function build()
    {
        return $this->subject('Interview Form Link')
            ->view('emails.interview');
    }
}
