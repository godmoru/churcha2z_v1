<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenditureType extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\ExpenditureCategory', 'expenditure_category_id','id');
    }

    public function Expenditures()
    {
    	return $this->hasMany(LocationExpenditure::class, 'expenditure_type_id');
    }

    public function CurrentExpendituresMonth()
    {
    	return $this->hasMany(LocationExpenditure::class, 'expenditure_type_id')->where('year', date('Y'))->where('month', date('m'))->where('location_id', \Auth::user()->location_id);
    }

    public function CurrentExpendituresYear()
    {
    	return $this->hasMany(LocationExpenditure::class, 'expenditure_type_id')->where('year', date('Y'))->where('location_id', \Auth::user()->location_id);
    }

    public function singleCurrentExpendituresMonth()
    {
    	return $this->hasOne(LocationExpenditure::class, 'expenditure_type_id')->where('year', date('Y'))->where('month', date('m'))->where('location_id', \Auth::user()->location_id)->latest();
    }

    public function singleCurrentExpendituresYear()
    {
    	return $this->hasOne(LocationExpenditure::class, 'expenditure_type_id')->where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->latest();
    }
}
