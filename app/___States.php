
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class __States extends Model
{
   	
   	public function stateLga()
    {

        return $this->hasMany('App\Lga', 'state_code', 'state_code');
    }

    public function locations()
    {
	   return $this->hasMany('App\Locations', 'id_state', 'id');
    }

    public function loc_state()
    {
       return $this->hasMany('App\Pastors', 'id_state', 'id_state');
    }

    public function Mstate()

    {

        return $this->hasMany('App\Member', 'id_state', 'id_state');
    }

}
