<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PastorCategory extends Model
{
    public function pastors()
	{
		return $this->HasMany(Pastor::class);
	}
}
