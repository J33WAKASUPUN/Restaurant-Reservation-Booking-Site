@extends('layouts.app')

@section('title', 'Feedback')

@section('content')
    <div class="bg-gray-700 p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">We value your feedback</h2>
        <form method="POST" action="{{ route('feedback.store') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block">Name</label>
                <input type="text" name="name" id="name" class="w-full p-2 bg-gray-800 text-white rounded" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block">Email</label>
                <input type="email" name="email" id="email" class="w-full p-2 bg-gray-800 text-white rounded" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block">Message</label>
                <textarea name="message" id="message" rows="4" class="w-full p-2 bg-gray-800 text-white rounded" required></textarea>
            </div>
            <button type="submit" class="bg-red-500 px-4 py-2 rounded hover:bg-red-700">Submit Feedback</button>
        </form>
    </div>
@endsection
