<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'mobile_number'
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
