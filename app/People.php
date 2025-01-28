<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'people';
   // protected $fillable = ['fname','mname','lname','phone1','phone2','email','address','cat','gender'];

    public function getPeople()
    {
      
    }
    public function people_loc()
    {
        return $this->BelongsTo('App\Location', 'location_id', 'id');
    }

    public function getCategory()
    {
       return $this->BelongsTo('App\PeopleCategory', 'people_category_id', 'id');
    }

    public function getPGender()
    {
        return $this->BelongsTo('App\Gender', 'id_gender', 'id');
    }

    public function getPFClassStatus()
    {
        return $this->BelongsTo('App\ClassStatus', 'fclass_status', 'id');
    }

    public function getPDLTCStatus()
    {
        return $this->BelongsTo('App\ClassStatus', 'dltc_status', 'id');
    }

    public function serviceT()
    {
        return $this->BelongsTo('App\Service', 'service_id', 'id');
    }

    public function getFClassAttendance()
    {
        return $this->HasMany('App\FoundationClassAttendance', 'people_id', 'id');
    }

    public function scopeConverts($query,$id){
        return $query->where('people_category_id',1);
    }


}