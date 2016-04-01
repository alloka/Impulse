<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment'
    ];

        public function support_agent()
    {
    	return $this->belongsTo('App\Support_Agent');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }

    public function supervisor()
    {
    	return $this->belongsTo('App\Supervisor');
    }

    public function admin()
    {
    	return $this->belongsTo('App\Admin');
    }

    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }

}
