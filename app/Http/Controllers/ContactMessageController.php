<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmission;
use Illuminate\Support\Facades\Log;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);

        try {
            // Save contact message to database
            $contactMessage = ContactMessage::create($validatedData);

            // Send email to restaurant
            try {
                Mail::to(config('mail.from.address'))  // Use the default from address in config
                    ->send(new ContactFormSubmission($validatedData));
            } catch (\Exception $emailException) {
                // Log email sending error but don't stop the process
                Log::error('Contact form email sending error: ' . $emailException->getMessage());
            }

            return redirect()->back()->with('contact_success', 'Your message has been sent successfully. We will get back to you soon!');
        } catch (\Exception $e) {
            Log::error('Contact message submission error: ' . $e->getMessage());
            return redirect()->back()->with('contact_error', 'Failed to send message. Please try again.');
        }
    }
}
