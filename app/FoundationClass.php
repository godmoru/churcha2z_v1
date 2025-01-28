<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoundationClass extends Model
{
    public function participants()
    {
    	return $this->hasMany(FoundationClassAttendance::class);
    }

    public function counselor()
    {
    	return $this->belongsTo('\App\Counselor', 'counselor_id', 'id');
    	// return $this->belongsTo(Counselor::class);
    }
    public function scopeGrad()
    {
    	return $this->hasMany(FoundationClassAttendance::class)->where('class_1_status', 1)->where('class_2_status', 1)->where('class_3_status', 1)->where('class_4_status', 1)->where('class_5_status', 1)->where('class_6_status', 1);
    }
     public function scopeNonGrad()
    {
        return $this->hasMany(FoundationClassAttendance::class)->where('class_3_status', null);//->orWhere('class_2_status', 1)->orWhere('class_3_status', null)->orWhere('class_4_status', null)->orWhere('class_5_status', null)->orWhere('class_6_status', null);
    	// return $this->hasMany(FoundationClassAttendance::class)->where('class_1_status', 1)->orWhere('class_2_status', 1)->orWhere('class_3_status', null)->orWhere('class_4_status', null)->orWhere('class_5_status', null)->orWhere('class_6_status', null);
    }

    public function AbsentC1()
    {
    	return $this->hasMany(FoundationClassAttendance::class)->where('class_1_status', null);
    }
    public function AbsentC2()
    {
    	return $this->hasMany(FoundationClassAttendance::class)->where('class_2_status', null);
    }

    public function AbsentC3()
    {
    	return $this->hasMany(FoundationClassAttendance::class)->where('class_3_status', null);
    }

    public function AbsentC4()
    {
    	return $this->hasMany(FoundationClassAttendance::class)->where('class_4_status', null);
    }

    public function AbsentC5()
    {
    	return $this->hasMany(FoundationClassAttendance::class)->where('class_5_status', null);
    }

    public function AbsentC6()
    {
    	return $this->hasMany(FoundationClassAttendance::class)->where('class_6_status', null);
    }

}
