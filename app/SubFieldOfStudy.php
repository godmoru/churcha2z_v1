<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubFieldOfStudy extends Model
{
    public function members()
    {
    	return $this->hasMany('\App\MemberQualificationInfo', 'sub_field_of_study_id', 'id');
    }

    public function parentField()
    {
    	return $this->belongsTo('\App\FieldOfStudy', 'field_of_study_id', 'id');
    }
}
