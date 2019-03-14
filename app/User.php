<?php

namespace App;
use App\Models\Matching;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'username',
        'email',
        'password',
        'upline',
        'phone',
        'btc',
        'eth',
        'city',
        'state',
        'country',
        'role_id'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName()
    {
        # gimme the tag where the name column is same as what is passed
        return 'username';
    }
/*
    public function getPasswordAttribute($value)
    {
        return decrypt($value);
    }*/

    public function transactions(){
        return $this->hasMany('App\Models\Transaction');
    }

    public function withdrawals(){
        return $this->hasMany('App\Models\Withdraw');
    }

    public function referrals(){
        return $this->hasMany('App\Models\Referral');
    }

    public function userPlans()
    {
       return $this->hasOne(\App\Models\UserPlan::class, 'user_id', 'id');
    }

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

    /* public function userPlans()
     {
         return $this->hasOne(\App\Models\UserPlan::class, 'user_id', 'id');
     }*/


}
