<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password'
    ];

        public function tickets()
    {
    	return $this->hasMany('App\Ticket');
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    public function admin()
    {
    	return $this->belongsTo('App\Admin');
    }
}
