<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {
	protected $table='members';

		public function getMembersLocation()
	 {
	 	return $this->BelongsTo('App\Location', 'location_id', 'id');
	 }

	 public function get_mState()
	 {
	 	return $this->BelongsTo('App\State', 'state_id', 'id');
	 }

	 public function get_mLGA()
	 {
	 	return $this->BelongsTo('App\Lga', 'lga_id', 'id');
	 }


	 public function get_MDistrict()
	 {
	 	return $this->BelongsTo('App\District', 'district_id', 'id');
	 }
	public function get_mLoc()
	{
		//return Locations::where("id", "=", $this->id_loc)->get();
		return $this->BelongsTo('App\Location', 'location_id', 'id');
	}

	public function getMGender()
	{
		return $this->BelongsTo('App\Gender', 'gender', 'id');
	}

	public function getMmaritalStatus()
	{
		return $this->BelongsTo('App\MaritalStatus', 'marital_status_id', 'id');
	}


	public function getMFClassStatus()
	{
		return $this->BelongsTo('App\ClassStatus', 'fclass_status', 'id');
	}

	public function getMDLTCStatus()
	{
		return $this->BelongsTo('App\ClassStatus', 'dltc_status', 'id');
	}
	public function gethomecell()
	{
		return $this->BelongsTo('App\Homecell', 'homecell_id', 'id');
	}

	public function getdept()
	{
		return $this->BelongsTo('App\Workforcedept', 'workforcedept_id', 'id');
	}

	public function getNOK()
	{
		return $this->hasOne(MemberNextOfKinInfo::class);
	}

	public function getQualInfo()
	{
		return $this->hasMany('App\MemberQualificationInfo', 'member_id', 'id');
	}

	public function getEmploymentInfo()
	{
		return $this->hasOne(MemberEmploymentInfo::class);
	}

	public function getPostings()
	{
		return $this->hasMany(MemberPosting::class);
	}


} //End class

