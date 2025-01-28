<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

	
    public function getServiceFT()
    {
    	return $this->hasMany('\App\People', 'service_id', 'id')->where('people_category_id', 1)->where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'));
    }

    public function getServiceNC()
    {
    	return $this->hasMany('\App\People', 'service_id', 'id')->where('people_category_id', 2)->where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'));
    }

    public function getService2FT()
    {
    	return $this->hasMany('\App\People', 'service_id', 'id')->where('people_category_id', 1)->where('service_id', 2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'));
    }

    public function getService2NC()
    {
    	return $this->hasMany('\App\People', 'service_id', 'id')->where('people_category_id', 2)->where('service_id', 2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'));
    }

    public function getService3FT()
    {
    	return $this->hasMany('\App\People', 'service_id', 'id')->where('people_category_id', 1)->where('service_id', 3)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'));
    }

    public function getService3NC()
    {
    	return $this->hasMany('\App\People', 'service_id', 'id')->where('people_category_id', 2)->where('service_id', 3)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'));
    }

    public function getService4FT()
    {
    	return $this->hasMany('\App\People', 'service_id', 'id')->where('people_category_id', 1)->where('service_id', 4)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'));
    }

    public function getService4NC()
    {
    	return $this->hasMany('\App\People', 'service_id', 'id')->where('people_category_id', 2)->where('service_id', 4)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'));
    }

    public function getService5FT()
    {
    	return $this->hasMany('\App\People', 'service_id', 'id')->where('people_category_id', 1)->where('service_id', 5)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'));
    }

    public function getService5NC()
    {
    	return $this->hasMany('\App\People', 'service_id', 'id')->where('people_category_id', 2)->where('service_id', 5)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'));
    }

    public function getService6FT()
    {
    	return $this->hasMany('\App\People', 'service_id', 'id')->where('people_category_id', 1)->where('service_id', 6)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'));
    }

    public function getService6NC()
    {
        return $this->hasMany('\App\People', 'service_id', 'id')->where('people_category_id', 2)->where('service_id', 6)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'));
    }

    public function fSvcM()
    {
        return $this->hasMany('\App\ServiceAttendance', 'service_id', 'id')->where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'));
    	// return $m->male;
    }

    public function todayAtt()
    {
        return $this->hasMany('\App\ServiceAttendance', 'service_id', 'id')->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'));
        // return $m->male;
    }





}
