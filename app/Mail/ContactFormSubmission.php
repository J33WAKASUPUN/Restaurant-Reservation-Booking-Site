<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmission extends Mailable
{
    use Queueable, SerializesModels;

    public $contactDetails;

    public function __construct($contactDetails)
    {
        $this->contactDetails = $contactDetails;
    }

    public function build()
    {
        return $this->subject('New Contact Form Submission')
                    ->from($this->contactDetails['email'])
                    ->view('emails.contact-form')
                    ->with('details', $this->contactDetails);
    }
}
