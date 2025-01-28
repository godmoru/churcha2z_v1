<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationServiceSetting extends Model
{
    public function services()
	{
		return $this->belongsTo('\App\Service', 'service_id', 'id');
	}
}
