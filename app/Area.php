<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function getHomeCells()
	{
		return $this->HasMany(Homecell::class);
	}

	public function zone()
	{
		return $this->belongsTo('\App\Zone', 'zone_id', 'id');
	}
}
