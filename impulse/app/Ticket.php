<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class TicketStatus {
    const open = 0;
    const close = 1;
    const pending = 2;
    const solved = 3;
}
abstract class TicketPriority {
    const low = 1;
    const middle = 2;
    const high = 3;
    const critical = 4;
}

class Ticket extends Model
{
    protected $ticket_status = ['open', 'pending', 'close', 'solved'];

    protected $fillable = [
        'status',  'priority' , 'open_time' , 'close_time'
    ];

    public function support_agent()
    {
    	return $this->belongsToMany('App\Support_Agent');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }

    public function supervisor()
    {
    	return $this->belongsTo('App\Supervisor');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

        public function getPriority()
         {
        switch ($this->priority) {
            case TicketPriority::low:
                return 'Low';
                break;
            case TicketPriority::middle:
                return 'Middle';
                break;
            case TicketPriority::high:
                return 'High';
                break;
            case TicketPriority::critical:
                return 'Critical';
                break;
            default:
                return 'Invalid priority';
                break;
        }
    }
    /**
     *  Return Ticket status as string
     */
    public function getTicketStatus()
     {
        switch ($this->status) {
            case TicketStatus::open:
                return 'open';
                break;
            case TicketStatus::close:
                return 'close';
                break;
            case TicketStatus::pending:
                return 'pending';
                break;
            case TicketStatus::solved:
                return 'solved';
                break;
            default:
                return 'invalid status';
                break;
        }
    }

}