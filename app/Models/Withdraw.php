<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class Withdraw extends Model
{

    use SoftDeletes;

    protected $fillable = ['id', 'user_id', 'amount', 'payment_mode', 'status', 'payment_date'];

    public function user(){
        return $this->belongsTo('App\User');
    }

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
