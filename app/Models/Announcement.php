<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = ['id', 'subject', 'content'];


   /* public function setSubjectAttribute($value)
    {
        $this->attributes['subject'] = strtoupper($value);
    }*/

    public function getSubjectAttribute($value)
    {
        return strtoupper($value);
    }
}
