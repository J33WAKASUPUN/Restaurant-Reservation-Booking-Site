<!DOCTYPE html>
<html>
<body>
    <h1>New Contact Form Submission</h1>
    <p>From: {{ $details['name'] }}</p>
    <p>Email: {{ $details['email'] }}</p>
    <p>Phone: {{ $details['phone'] }}</p>
    <p>Message:<br>{{ $details['message'] }}</p>
</body>
</html>
