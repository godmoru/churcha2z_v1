<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Homecell extends Model {

	public function getmembers()
	{
		return $this->hasMany(Member::class);
	}

	public function geconverts()
	{
		return $this->hasMany(People::class);
	}

	public function district()
	{
		return $this->belongsTo(District::class);
	}

}
