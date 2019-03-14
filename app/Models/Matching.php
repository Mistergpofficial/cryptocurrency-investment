<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matching extends Model
{

    /**
     * Generated
     */

    protected $table = 'matchings';
    protected $fillable = ['id', 'user_id', 'matched_to', 'status', 'payment_evidence'];


    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }


    public function matched()
    {
        return $this->belongsTo(\App\User::class, 'matched_to', 'id');
    }


}
