<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomeReportSource extends Model
{
    public function report()
    {
        return $this->belongsTo(IncomeReport::class,'income_report_source_id','id');
    }

    public function submittedBy()
	{
		return $this->belongsTo(User::class, 'created_by', 'id');
	}
}
