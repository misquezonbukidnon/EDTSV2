<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transaction;
use App\User;
use App\Endorsement;
use App\Event;

class Office extends Model
{
    protected $fillable = ['name', 'abbr'];

    public function transactions(){
        return $this->hasMany('App\Transaction');
    }

    public function events(){
        return $this->hasMany('App\Event');
    }

    public function users(){
    	return $this->hasMany('App\User');
    }

    public function endorsements(){
    	return $this->hasMany('App\Endorsement');
    }

    public function endorsing_offices(){
        return $this->hasMany('App\Endorsement');
    }

    public function receiving_offices(){
        return $this->hasMany('App\Endorsement');
    }

}
