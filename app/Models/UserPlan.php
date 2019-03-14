<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{

    /**
     * Generated
     */

    protected $table = 'user_plans';
    protected $fillable = ['id', 'user_id', 'plan_name'];


    public function plan()
    {
        return $this->belongsTo(\App\Models\Plan::class, 'plan_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }


}
