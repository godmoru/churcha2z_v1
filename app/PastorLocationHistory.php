<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PastorLocationHistory extends Model
{
    public function location()
    {
		return $this->BelongsTo('App\Location', 'location_id', 'id');
    }
    public function pType()
    {
		return $this->BelongsTo('App\PastorType', 'type_id', 'id');
    }
    
    public function pastor()
    {
		return $this->BelongsTo('App\Pastor', 'pastor_id', 'id');
    }
}
