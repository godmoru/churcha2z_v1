<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeopleCategory extends Model
{
    protected $table = 'people_categories';
	public function get_peopleincat()

	{
		return $this->hasMany(People::class);
		// return $this->hasMany('App\People', 'poeple_category_id','id');
	}
	
	public function get_peopleincatLocation()

	{
		return $this->hasMany(People::class)->where('location_id', \Auth::user()->location_id);
		// return $this->hasMany('App\People', 'poeple_category_id','id');
	}

}
