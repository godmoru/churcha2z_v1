<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenditureCategory extends Model
{
    public function gettypes()
    {
    	return $this->hasMany(ExpenditureType::class);
    }
}
