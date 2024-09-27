<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use App\Mail\TicketClosed;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Ticket List';
        $tickets = Ticket::latest()->get();
        return view('admin.ticket.index',compact('pageTitle','tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   $pageTitle = 'Edit Ticket';
        $ticket = Ticket::findOrFail($id);
        return view('admin.ticket.edit', compact('ticket','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:open,in_progress,resolved,closed',
        ]);
    
        $ticket = Ticket::findOrFail($id);
        $oldStatus = $ticket->status;
    
        // Update the ticket
        $ticket->update($request->all());
    
        // Check if the ticket has been closed
        if ($oldStatus !== 'closed' && $request->status === 'closed') {
            // Send email notification to the customer
            Mail::to($ticket->user->email)->send(new TicketClosed($ticket));
        }
    
        flash()->addSuccess("Ticket updated successfully!");
        return redirect('/admin/tickets');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        flash()->addSuccess("Ticket deleted successfully!.");
        $url = '/admin/tickets';
        return redirect($url);
    }
}
