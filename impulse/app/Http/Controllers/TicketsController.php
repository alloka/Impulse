<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TicketsController extends Controller
{




   

	public function show($id)
    {
        $tickets = \App\Ticket::findOrFail($id);
        return $tickets;
        return view('tickets.show', compact('ticket'));
        // if (is_null($tickets))
        // {
        //  return();
        // }
    }

  

}
