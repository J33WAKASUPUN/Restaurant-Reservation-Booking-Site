<!DOCTYPE html>
<html>
<body>
    <h1>Reservation Confirmed</h1>
    <p>Dear {{ $details['fullname'] }},</p>
    <p>Your reservation at Unimo Restaurant has been confirmed:</p>
    <ul>
        <li>Date: {{ $details['date'] }}</li>
        <li>Time: {{ $details['time'] }}</li>
        <li>Special Occasion: {{ $details['special_occasion'] ?? 'None' }}</li>
        <li>Item: {{ $details['item'] }}</li>
    </ul>
    <p>We look forward to serving you!</p>
    <p>Best regards,<br>Unimo Restaurant Team</p>
</body>
</html>
