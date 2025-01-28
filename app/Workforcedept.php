<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Workforcedept extends Model {

	public function getMembers()
	{
		return $this->hasMany(Member::class)->where('location_id', \Auth::user()->location_id);
	}

	public function ActiveHod()
	{
		return $this->belongsTo(Hod::class);
	}

}
