<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use App\Mail\TicketOpened;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Ticket List';
        $tickets = Ticket::where('user_id', Auth::id())->get();
        return view('user.ticket.index',compact('pageTitle','tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Add New Ticket';
        return view('user.ticket.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high',
        ]);

        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'description' => $request->description,
            'status' => 'open', 
            'priority' => $request->priority,
        ]);
        
        // Send email notification to admin
        Mail::to('admin@example.com')->send(new TicketOpened($ticket));

        flash()->addSuccess("Ticket created successfully!.");
        $url = '/user/tickets';
        return redirect($url);
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
    public function edit($id)
    {
        $pageTitle = 'Edit Ticket';
        $ticket = Ticket::findOrFail($id);
        return view('user.ticket.edit', compact('ticket','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());

        flash()->addSuccess("Ticket updated successfully!.");
        $url = '/user/tickets';
        return redirect($url);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        flash()->addSuccess("Ticket deleted successfully!.");
        $url = '/user/tickets';
        return redirect($url);
    }
}
