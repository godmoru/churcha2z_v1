<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceAttendance extends Model
{
    public function service()
    {
		return $this->BelongsTo('App\Service', 'service_id', 'id');
    }

    public function countArea()
    {
    	return $this->BelongsTo(CountingArea::class);
    }
}
