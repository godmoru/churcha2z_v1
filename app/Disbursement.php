<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disbursement extends Model
{
    protected $guarded = ['_token','branch_income','hq_income'];

    public $attachments = [
        'document'
    ];

    public function Location()
    {
        return $this->belongsTo(Location::class,'location_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
