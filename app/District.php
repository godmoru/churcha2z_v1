<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model {

	

	public function getLocation()
    {
        return $this->BelongsTo('App\Location', 'location_id', 'id');
    }


    public function getNewConverts()
	{
		return $this->HasMany('App\People', 'location_area_id', 'id')->where('people_category_id', 1);
	}

	public function getFirstTimers()
	{
		return $this->HasMany('App\People', 'location_area_id', 'id')->where('people_category_id', 2);
	}

	public function getDailyEvangelism()
	{
		return $this->HasMany('App\People', 'location_area_id', 'id')->where('people_category_id', 6);
	}

 	public function getAreas()
	{
		return $this->HasMany(Area::class);
	}

	public function getZones()
	{
		return $this->HasMany(Zone::class);
	}

	public function getHomeCells()
	{
		return $this->HasMany(Homecell::class);
	}




}
