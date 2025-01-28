<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PeopleCat extends Model {
protected $table = 'people_cat';
	//

	public function get_peopleincat()

	{
		return $this->hasMany('App\People', 'people_category_id','id');

	}

}
