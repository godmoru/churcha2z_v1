<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberQualificationInfo extends Model
{
    public function getQualName()
    {
    	return $this->belongsTo('App\Qualification', 'qualification_id', 'id');
    }

    public function field()
    {
    	return $this->belongsTo('\App\FieldOfStudy', 'field_of_study_id', 'id');

    }

    public function getCourse()
    {
    	return $this->belongsTo('\App\SubFieldOfStudy', 'sub_field_of_study_id', 'id');
    }
}
