<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountingArea extends Model
{
    public function getAttendance()
   {
   	return $this->hasMany('\App\ServiceAttendance', 'count_area_id', 'id')->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'));
   	// return $this->hasMany(ServiceAttendance::class);
   }
}
