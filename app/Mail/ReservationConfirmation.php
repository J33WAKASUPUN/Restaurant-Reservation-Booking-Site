<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $reservationDetails;

    public function __construct($reservationDetails)
    {
        $this->reservationDetails = $reservationDetails;
    }

    public function build()
    {
        return $this->subject('Your Reservation at Unimo Restaurant')
                    ->view('emails.reservation-confirmation')
                    ->with('details', $this->reservationDetails);
    }
}
