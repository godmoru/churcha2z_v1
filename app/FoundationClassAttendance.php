<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoundationClassAttendance extends Model
{
    public function people()
    {
    	return $this->belongsTo('\App\People', 'people_id', 'id');
    }
}
