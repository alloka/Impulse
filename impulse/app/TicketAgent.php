<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketAgent extends Model
{
	protected $table = "ticket_agent";
    //
    public function support_agent(){
    	return $this->belongsTo('App\User','user_id');
    }

    public function ticket(){
    	return $this->belongsTo('App\Ticket');
    }
}
