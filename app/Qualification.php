<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    // public function getschool()
    // {
    // 	return $this-belongsTo('\App\School', 'school_id', 'id');
    // }

    public function getMembers()
    {
    	return $this->hasMany(Member::class);
    }
}
