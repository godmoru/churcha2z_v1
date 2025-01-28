<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accountant extends Model
{
    public function loc()
	{
		return $this->hasOne('App\Location', 'id', 'location_id');
	}
	
	public function getUData()
    {
        return $this->belongsTo('\App\User', 'email', 'email');
    }
}