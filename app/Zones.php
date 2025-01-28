<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Zones extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'zones';
   
    public function getZones()
    {
      
    }

        public function locations()
	{
		return $this->hasMany('App\Locations', 'id_zone', 'id_zone');
	}

}