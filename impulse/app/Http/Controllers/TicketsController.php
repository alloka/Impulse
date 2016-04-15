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
        $tickets = Ticket::with('isFrom')->get();
        //return view('tickets.index', compact('tickets'));
    }

    public function create() {
        //return view('tickets.create');
    }

	public function show($id)
    {
        $tickets = \App\Ticket::findOrFail($id);
        $users = \DB::table('users')->lists('username', 'id');
        //return view('tickets.show', compact('tickets','users'));
    }

     public function store(TicketRequest $request) {
        $input = $request->all();
        $ticket = Ticket::create($input);
       // return redirect('tickets');
    }


    public function edit($id) {
        $ticket = Ticket::findOrFail($id);
        //return view('tickets.edit', compact('ticket'));
    }

    public function update($id, Request $request) {
        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());
        //return redirect('tickets');
    }

     public function destroy($id) {
        $data = Ticket::find($id);
        $data->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the ticket!');
        //return Redirect::to('tickets');
    }

}
