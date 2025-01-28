<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function type()
    {
    	return $this->belongsTo('\App\AssetType', 'asset_type_id', 'id');
    }

    public function location()
    {
    	return $this->belongsTo('\App\Location', 'location_id', 'id');
    }
}
