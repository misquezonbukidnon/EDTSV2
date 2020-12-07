<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transaction;
use App\ProcessType;
use App\Office;
use App\PrDescription;
use App\Status;
use App\Event;
use App\Attachment;
use App\Canvaser;
use App\ActionTaken;
use App\User;
class Endorsement extends Model
{
    protected $fillable = [
    	'transactions_id',
    	'offices_id',
    	'date_endorsed',
    	'date_received',
        'statuses_id',
        'canvasers_id',
        'action_takens_id',
        'users_id'
    ];


    public function transactions(){
        return $this->belongsTo('App\Transaction', 'transactions_id');
    }

    public function offices(){
        return $this->belongsTo('App\Office', 'offices_id');
    }

    public function endorsing_offices(){
        return $this->belongsTo('App\Office', 'offices_id');
    }

    public function receiving_offices(){
        return $this->belongsTo('App\Office', 'offices_id');
    }

    public function statuses(){
        return $this->belongsTo('App\Status', 'statuses_id');
    }

    public function events(){
        return $this->hasMany('App\Event');
    }

    public function attachments(){
        return $this->hasMany('App\Attachment');
    }

    public function canvasers(){
        return $this->belongsTo('App\Canvaser', 'canvasers_id');
    }

    public function actiontaken(){
        return $this->belongsTo('App\ActionTaken', 'action_takens_id');
    }

    public function users(){
        return $this->hasMany('App\User');
    }
   
}
