<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',  'password'
    ];

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    public function tickets()
    {
    	return $this->hasMany('App\Ticket');
    }
    public function supervisors()
    {
    	return $this->hasMany('App\Supervisor');
    }

    public function agents()
    {
    	return $this->hasMany('App\Support_Agent');
    }

    public function customers()
    {
    	return $this->hasMany('App\Customer');
    }
}
