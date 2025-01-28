<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetType extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\AssetCategory', 'asset_category_id','id');
    }

    public function assets()
    {
    	return $this->hasMany('App\Asset', 'id', 'asset_type_id');
    }
}
