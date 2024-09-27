<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Closed Notification</title>
</head>
<body>
    <h1>Your Ticket Has Been Closed</h1>
    <p>Dear Customer,</p>
    <p>Your ticket with the subject "<strong>{{ $ticket->status }}</strong>" has been closed.</p>
    <p>Thank you for using our service!</p>
    <p>Best Regards,<br>Netcoden Inc Team</p>
</body>
</html>
