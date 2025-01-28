<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberNextOfKinInfo extends Model
{
    public function primary()
    {
    	return $this->belongsToOne(Member::Class);
    }
}
