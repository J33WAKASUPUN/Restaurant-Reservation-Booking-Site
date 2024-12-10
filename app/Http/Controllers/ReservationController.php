<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirmation;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'fullname' => 'required|string|max:255',
                'email' => 'required|email',
                'contact_number' => 'required|string|max:15',
                'date' => 'required|date',
                'time' => 'required',
                'special_occasion' => 'nullable|string|max:255',
                'item' => 'required|string|max:255',
                'quantity' => 'required|integer|min:1',
                'payment_method' => 'required|string',
            ]);

            $reservation = Reservation::create($validated);

            if ($reservation) {
                // Send confirmation email
                try {
                    Mail::to($validated['email'])->send(new ReservationConfirmation($validated));
                } catch (\Exception $emailException) {
                    // Log email sending error but don't stop the process
                    Log::error('Reservation confirmation email error: ' . $emailException->getMessage());
                }

                Log::info('Reservation created successfully', ['id' => $reservation->id]);
                return redirect()->route('home')->with('success', 'Reservation submitted successfully! A confirmation email has been sent.');
            } else {
                Log::error('Reservation creation failed');
                return back()->with('error', 'Failed to submit reservation. Please try again.');
            }
        } catch (\Exception $e) {
            Log::error('Reservation submission error: ' . $e->getMessage());
            return back()->withErrors(['msg' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
