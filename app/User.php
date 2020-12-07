<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Office;
use App\Role;
use App\Endorsement;
use App\Transaction;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'offices_id', 'roles_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function offices(){
        return $this->belongsTo('App\Office', 'offices_id');
    }

    public function roles(){
        return $this->belongsTo('App\Role', 'roles_id');
    }

    public function endorsements(){
        return $this->belongsTo('App\Endorsement', 'endorsements_id');
    }

    public function transactions(){
        return $this->belongsTo('App\Transaction', 'transactions_id');
    }
}
