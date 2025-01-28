<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    public function getAreas()
    {
		return $this->HasMany(Area::class);

    }

    public function getHomeCells()
	{
		return $this->HasMany(Homecell::class);
	}

	public function district()
	{
		return $this->belongsTo('\App\District', 'district_id', 'id');
	}
}
