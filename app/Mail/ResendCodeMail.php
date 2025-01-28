<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResendCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    // public $event;
    public $optCode;
    public $names;

    public function __construct($names, $optCode)
    {
        $this->names = $names;
        $this->optCode = $optCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@a2z.church', 'DIGC Information Management System')
        ->subject('Verification Code')
        ->view('emails.notifications.resendcode');
        // ->with(['title' => $this->event->name]);
    }


}
