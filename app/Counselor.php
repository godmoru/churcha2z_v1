<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Counselor extends Model {

protected $dates = ['deleted_at'];
//use SoftDeletes;

public function getLocation()
	{
		return $this->BelongsTo('App\Location', 'id_loc', 'id');
	}


public function getState()

	{
		return $this->BelongsTo('App\State', 'id_state', 'id_state');

	}

	public function getClassBatch()
	{
		return $this->hasOne(FoundationClass::class)->where('status', 1);
	}
}
