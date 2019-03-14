<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model {

    /**
     * Generated
     */

    protected $table = 'plans';
    protected $fillable = ['id', 'name'];


    public function userPlans() {
        return $this->hasMany(\App\Models\UserPlan::class, 'plan_id', 'id');
    }


}
