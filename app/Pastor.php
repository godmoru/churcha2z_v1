<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;



class Pastor extends Model
{
// 	use SoftDeletes;

    public function get_loc()
	{
// 		return $this->hasOne(Location::class);
		return $this->hasOne('App\Location', 'id', 'location_id');
	}

	public function get_pst_state()

	{
		return $this->BelongsTo('App\State', 'id_state', 'id_state');
	}

	public function loc_pst()

	{
		return $this->BelongsTo('App\Locations', 'location_id', 'id');		
	}

	public function type()
	{
		// return $this->hasOne(Location::class);

		return $this->BelongsTo('\App\PastorType', 'pastor_type_id', 'id');
	}
	
	public function category()
	{
		return $this->BelongsTo('\App\PastorCategory', 'pastor_category_id', 'id');
	}
	
	public function postingHistories()
	{
		return $this->hasMany('\App\PastorLocationHistory', 'pastor_id', 'id');
	}
	
	public function plantedLoc()
	{
		return $this->hasMany('\App\Location', 'presiding_pastor_id', 'id');
	}
	
	public function userData()
    {
        return $this->belongsTo('\App\User', 'email', 'email');
    }
}
