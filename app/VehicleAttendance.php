<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleAttendance extends Model
{

	public function service()
    {
		return $this->BelongsTo('App\Service', 'service_id', 'id');
    }
    
   public function countingArea()
    {
    	return $this->BelongsTo('App\VehicleCountingArea', 'vehicle_counting_area_id', 'id');
    }
}
