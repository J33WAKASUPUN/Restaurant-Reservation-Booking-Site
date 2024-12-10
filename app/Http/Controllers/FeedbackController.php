<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    // Show feedback form
    public function create()
    {
        return view('feedback.create');
    }

    // Store feedback in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Feedback::create($validated);

        return redirect()->route('home')->with('success', 'Thank you for your feedback!');
    }
}
