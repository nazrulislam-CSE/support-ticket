<!DOCTYPE html>
<html>
<head>
    <title>New Ticket Opened</title>
</head>
<body>
    <h1>New Ticket Opened</h1>
    <p>A new ticket has been opened with the following details:</p>
    <p><strong>Subject:</strong> {{ $ticket->subject }}</p>
    <p><strong>Description:</strong> {{ $ticket->description }}</p>
    <p><strong>Priority:</strong> {{ ucfirst($ticket->priority) }}</p>
    <p><strong>Status:</strong> {{ ucfirst($ticket->status) }}</p>
</body>
</html>
