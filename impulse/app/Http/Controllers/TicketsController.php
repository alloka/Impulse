<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TicketsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $tickets = \App\Ticket::with('comments')->all();
        //return view('tickets.index', compact('tickets'));
    }

    public function create() {
        //return view('tickets.create');
    }

	public function show($id)
    {
        $tickets = \App\Ticket::findOrFail($id);
        //return view('tickets.show', compact('tickets','users'));
    }

     public function store(TicketRequest $request) {
        $input = $request->all();
        $ticket = \App\Ticket::create($input);
         $ticket->save();
       // return redirect('tickets');
    }


    public function edit($id) {
        $ticket = \App\Ticket::findOrFail($id);
        //return view('tickets.edit', compact('ticket'));
    }

    public function update($id, Request $request) {
        $ticket = \App\Ticket::findOrFail($id);
        $ticket->update($request->all());
        $ticket->save();
        //return redirect('tickets');
    }

     public function destroy($id) {
        $data = \App\Ticket::find($id);
        $data->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the ticket!');
        //return Redirect::to('tickets');
    }

}
