<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $names;
    public $location;

    public function __construct($names, $location)
    {
        $this->names = $names;
        $this->location = $location;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@a2z.church', 'DIGC Information Management System')
        ->subject('Location Posting Update')
        ->view('emails.notifications.posting');

        // return $this->view('view.name');
    }
}
