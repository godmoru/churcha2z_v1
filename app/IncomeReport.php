<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomeReport extends Model
{
    public function submittedBy()
	{
		return $this->belongsTo('\App\User', 'submitted_by', 'id');
	}
	
	public function isEdited()
    {
    	return $this->hasMany(IncomeReportEdited::class);
    }

    public function source()
    {
    	return $this->belongsTo(IncomeReportSource::class,'income_report_source_id');
    }
    
    public function loc()
    {
        return $this->belongsTo('\App\Location', 'location_id', 'id');
    }
    
    public function serviceType()
    {
        return $this->belongsTo('\App\ServiceType', 'service_type_id', 'id');
    }
}
