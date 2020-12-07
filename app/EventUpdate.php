<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class EventUpdate extends Model
{
    protected $fillable = ['events_id', 'offices_id', 'datetime', 'report'];   

    public function events(){
        return $this->BelongsTo('App\Event', 'events_id');
    }
}
