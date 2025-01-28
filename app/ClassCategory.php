<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassCategory extends Model
{
    public function getCordinator()
    {
		return $this->BelongsTo('App\Pastors', 'cordinator_id', 'id');
    	
    }

    public function getfPeople()
    {
		// return $this->hasMany('\App\People', 'fclass_status', 1);
		return People::where("fclass_status", "=",1);

    }
    public function getdltcPeople()
    {
		return $this->hasMany('\App\People', 'id')->where('dltc_status', 1);
    }
    public function getdusomPeople()
    {
		return $this->hasMany('\App\Member', 'id')->where('dusom_status', 1);
    }

    public function scopefclass(){
        return \App\People::where('fclass_status','=',1);
    }

}
