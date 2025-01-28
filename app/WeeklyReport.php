<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeeklyReport extends Model
{
    public function getPreacher()
    {
    	return $this->belongsTo(Pastor::class);
    }
    
    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }

    public function service()
    {
    	return $this->belongsTo(Service::class);
    }

    public function getEdited()
    {
    	return $this->hasMany(WeeklyReportEdited::class);
    }
    
}
