<?php

namespace App;
use App\Endorsement;
use Illuminate\Database\Eloquent\Model;

class Canvaser extends Model
{
    protected $fillable = ['name'];

    public function endorsements(){
        return $this->hasMany('App\Endorsement');
    }
}
