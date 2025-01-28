<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FClass extends Model {

	public function ft_in_class()

	{
		return $this->belongsTo('App\PeopleCategory', 'people_category_id', 'people_category_id', '=', '1');

	}

	public function newc_in_class()

	{
		return $this->belongsTo('App\PeopleCategory', 'people_category_id', 'people_category_id', '=', '2');

	}
	//

}
