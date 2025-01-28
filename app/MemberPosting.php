<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberPosting extends Model
{
    public function dept()
    {
    	// return $this->belongsTo(Workforcedept::class);
		return $this->BelongsTo('App\Workforcedept', 'workforcedept_id', 'id');

    }
}
