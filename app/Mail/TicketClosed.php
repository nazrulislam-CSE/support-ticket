<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Ticket;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content; 

class TicketClosed extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket; 

    /**
     * Create a new message instance.
     *
     * @param Ticket $ticket
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket; 
    }

    /**
     * Get the message envelope.
     */
    public function envelope()
    {
        return (new Envelope)
            ->subject('Your Ticket Has Been Closed');
    }

    /**
     * Get the message content definition.
     */
    public function content()
    {
        return (new Content)
            ->view('emails.ticket_closed'); 
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return []; // Return an empty array if no attachments are needed
    }

    public function build()
    {
        return $this->subject('Your Ticket Has Been Closed')
                    ->view('emails.ticket_closed');
    }
}
