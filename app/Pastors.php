<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pastors extends Model {

protected $table = 'pastors';
	//

public function get_loc()

	{
		return $this->BelongsTo('App\Location', 'id_loc', 'id');
	}

public function get_pst_state()

	{
		return $this->BelongsTo('App\States', 'id_state', 'id_state');

	}

	public function loc_pst()

	{

	return $this->BelongsTo('App\Locations', 'id_loc', 'id');		
	}
	
	
	public function type()
	{
		// return $this->hasOne(Location::class);

		return $this->BelongsTo('\App\PastorType', 'pastor_type_id', 'id');
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
