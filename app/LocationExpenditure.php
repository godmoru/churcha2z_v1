<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationExpenditure extends Model
{
    
    protected $guarded = ['_token','current_total'];

    public $attachments = [
        'document'
    ];
    
    public function Location()
    {
        return $this->belongsTo(Location::class,'location_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'submitted_by');
    }

    public function Type()
    {
        return $this->belongsTo(ExpenditureType::class,'expenditure_type_id');
    }

    public function Category()
    {
        return $this->belongsTo(ExpenditureCategory::class,'expenditure_category_id');
    }
}
