<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hod extends Model
{
   	public function getDept()
   	{
   		return $this->hasOne(WorkForceDept::class);
   	}
}
