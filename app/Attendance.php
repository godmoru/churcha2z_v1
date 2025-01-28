<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model {

	protected $table = 'attendances';
	
	public function get_monthly_male()
	{
		return $this->BelongsTo('App\People', 'id', 'id');

	}

	public function attendance()
	{
		return $this->BelongsTo('App\Locations', 'id_loc', 'id_loc');
	}

	public function getMaleCount()
	{
		return Attendance::where("male", ">", "0")->get();
	}
	public function getFemaleCount()
	{
		return Attendance::where("male", ">", "0")->get();
	}
	public function getTotalCount()
	{
		return Attendance::where("male", ">", "0")->get();
	}

	public function getLocationAttendance()
	{
		//return Attendance::where("id_loc", "=", "2")->get();
	}

	//

}
