<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetCategory extends Model
{
    public function assettypes()
    {
    	return $this->hasMany(AssetType::class);
    }
}
