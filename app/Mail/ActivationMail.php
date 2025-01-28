<?php

namespace App\Mail;

use \App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    // public $event;
    public $username;
    public $password;
    public $optCode;
    public $names;

    public function __construct($username, $password, $optCode, $names)
    {
        $this->username = $username;
        $this->password = $password;
        $this->optCode = $optCode;
        $this->names = $names;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hradmin@a2z.church', 'HR Plus')
        ->subject('Account Setup')
        ->view('emails.notifications.activation');
        // ->with(['title' => $this->event->name]);
    }


}
