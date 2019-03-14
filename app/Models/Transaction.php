<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;



class Transaction extends Model
{

    use SoftDeletes;



    protected $fillable = ['id','transact_id', 'amount', 'currency', 'returns', 'initial_returns', 'day_count', 'another_returns', 'balance', 'bal_after_30days', 'withdrawn', 'amount_btc', 'amount_eth', 'registras_plan', 'payment_mode', 'user_id', 'rate', 'transact_id', 'total'];

    public function user(){
        return $this->belongsTo('App\User');
    }




   /* public function getRateAttribute($value)
    {
        return 1 * ($value);
    }*/

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
/*
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }*/


    protected $dates = ['deleted_at'];
}
