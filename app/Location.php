<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {
protected $table = 'locations';
	//
	public function loc_state()
	{
		return $this->BelongsTo('App\State', 'id_state', 'id');
	}
	
	public function country()
	{
		return $this->BelongsTo('App\Country', 'country_id', 'id');
	}
	

	public function lcolga()
	{
		return $this->BelongsTo('App\Lga', 'id_lga', 'id');
	}

	public function loc_zone()
	{
		return $this->BelongsTo('App\GeoPolZone', 'id_zone', 'id');
	}

	public function loc_psts()
	{
		return $this->HasMany('App\Pastors', 'pastor_id', 'id');
	}
	public function loc_members()
	{
		return $this->HasMany('App\Member', 'location_id', 'id');
	}
	public function loc_converts()
	{
		return $this->HasMany('App\People', 'location_id', 'id');
	}
	public function get_attendance()
	{
		return $this->HasMany('App\Attendance', 'location_id', 'location_id');
	}
	public function get_loc_pst()
	{
		//return Pastors::where("id", "=", $this->pastor_id)->get();
		return $this->belongsTo('App\Pastors', 'pastor_id', 'id');
	}
	public function locmembers()
	{
		return People::where('location_id', '=', $this->id)->get();
	}

	public function get_pst_loc()
	{
		return $this->BelongsTo('App\Pastors', 'id', 'pastor_id');
		//return Pastors::Where("id", "=", $this->pastor_id)->get();
	}

	public function getfirsttimers()
	{
		return $this->hasMany(People::class)->where('people_category_id',1);
	}
	public function getnewconverts()
	{
		return $this->hasMany(People::class)->where('people_category_id',2);

	}
	public function getpeoplefromevangelism()
	{
		return $this->hasMany(People::class)->where('people_category_id',3);
	}

	public function getcrusadeoutreachpeople()
	{
		return $this->hasMany(People::class)->where('people_category_id',5);
	}


	public function locPsts()
	{
		return $this->hasMany('App\Pastors', 'id', 'pastor_id');
	}
	public function loc_pstx()
	{
		return $this->hasMany('App\Pastors', 'id_pst', 'id');		
	}

	// Home Churches \\

	public function gethomecells()
	{
		return $this->hasMany(Homecell::class);		
	}
	// End Home Churches \\

	// Establishment Classes Foundation and Maturity (DLTC Classes) \\

	public function getTotalFClass()
	{
		return $this->hasMany('App\People', 'location_id', 'id')->where('fclass_status', 1);		
		// return People::where("fclass_status", "=",1)->where('location_id', '=', $this->id)->get();

	}

	public function getTotalDLTC()
	{
		return $this->hasMany('App\People', 'location_id', 'id')->where('dltc_status', 1);		
		// return People::where("fclass_status", "=",1)->where('location_id', '=', $this->id)->get();

	}

	// End Home Churches \\

	public function getservicesettings()
	{
		return $this->hasMany('App\LocationServiceSetting', 'location_id', 'id');		
	}
	
	/** Weekly Report**/ 

	public function weeklyreports()
	{
		return $this->hasMany('App\WeeklyReport', 'location_id', 'id');		
	}
	/** End Weekly Report**/ 
	
	public function getPostingHistory()
	{
		return $this->hasMany('App\PastorLocationHistory', 'location_id', 'id');		
	}
    
	public function parentLoc()
	{
		return $this->belongsTo('\App\Location', 'parent_location_id', 'id');
	}

	public function locPlanted()
	{
		return $this->hasMany('\App\Location', 'parent_location_id', 'id');
	}
	public function plantingPst()
	{
		return $this->belongsTo('\App\Pastor', 'presiding_pastor_id', 'id');
	}
	
	public function poineeringPst()
	{
		return $this->belongsTo('\App\Pastor', 'first_resident_pastor_id', 'id');
	}

	public function firstResPst()
	{
		return $this->belongsTo('\App\Pastor', 'first_resident_pastor_id', 'id');
	}
	
	public function asstPst()
	{
		return $this->belongsTo('\App\Pastor', 'assistant_pastor_id', 'id');
	}
	
	public function monthlyIncomeReport()
	{
		$cash = IncomeReport::where('year', date('Y'))->where('month', date('m'))->where('location_id', $this->id)->sum('cash');
		$pos = IncomeReport::where('year', date('Y'))->where('month', date('m'))->where('location_id', $this->id)->sum('pos');
		$cheques = IncomeReport::where('year', date('Y'))->where('month', date('m'))->where('location_id', $this->id)->sum('cheques');

		$amount = number_format($cash+$pos+$cheques);

		return $amount;
	}

	public function accRec()
	{
		$accRec = AccountReconciliation::where('location_id',$this->id)->where('year_in_view',date('Y'))->where('month_in_view', date('m'))->first();

		return $accRec;
	}

	public function getExpenses()
	{
		$expenses = LocationExpenditure::where('month',date('m'))->where('year',date('Y'))->where('location_id',$this->id)->sum('amount');

		return $expenses;
	}

	public function getPrevBal()
	{
		$accRec = AccountReconciliation::where('location_id',$this->id)->where('year_in_view',date('Y'))->where('month_in_view', date('m')-1)->first();

		$expenses = LocationExpenditure::where('month',date('m')-1)->where('location_id',$this->id)->where('year',date('Y'))->sum('amount');

		$recurrent = $accRec ? $accRec->recurrent : 0.00;

		$prevBal = $recurrent - $expenses;

		return $prevBal;
	}

	public function currentRecurrent()
	{
		$accRec = AccountReconciliation::where('location_id',$this->id)->where('year_in_view',date('Y'))->where('month_in_view', date('m'))->first();

		$rec = $accRec ? $accRec->recurrent : 0.00;

		return $rec;
	}

	public function getMonthRecurrent($month)
	{
		$accRec = AccountReconciliation::where('location_id',$this->id)->where('year_in_view',date('Y'))->where('month_in_view', $month)->first();

		$rec = $accRec ? $accRec->recurrent : 0.00;

		return $rec;
	}

	public function monthlyAccRec($month)
	{
		$accRec = AccountReconciliation::where('location_id',$this->id)->where('year_in_view',date('Y'))->where('month_in_view', $month)->first();

		return $accRec;
	}

	public function getMonthPrevBal($month)
	{
		$year = date('Y');
		if ((int)$month == 1) {
			$month = 12;
			$year = date('Y') - 1;
		}else{
			$month = $month - 1;
		}
		$accRec = AccountReconciliation::where('location_id',$this->id)->where('year_in_view',$year)->where('month_in_view', $month)->first();

		$expenses = LocationExpenditure::where('month',$month)->where('location_id',$this->id)->where('year',$year)->sum('amount');

		$recurrent = $accRec ? $accRec->recurrent : 0.00;

		$prevBal = $recurrent - $expenses;

		return $prevBal;
	}

	public function getMonthExpenses($month)
	{
		$expenses = LocationExpenditure::where('month',$month)->where('year',date('Y'))->where('location_id',$this->id)->sum('amount');

		return $expenses;
	}

	public function getLPCurrTotal()
	{
		

		$accRec = AccountReconciliation::where('location_id',$this->id)->where('year_in_view',date('Y'))->where('month_in_view', date('m'))->first();

		$housing = $accRec ? $accRec->housing : 0.00;

		$lp = $accRec ? $accRec->location_projects : 0.00;

		$finalVal = $housing + $lp;

		return $finalVal;
	}

	public function getLPPrevBal()
	{
		$month = date('m');
		$year = date('Y');
		if ($month == 1) {
			$month = 12;
			$year = date('Y') - 1;
		}else{
			$month = date('m') -1;
		}

		$accRec = AccountReconciliation::where('location_id',$this->id)->where('year_in_view',date('Y'))->where('month_in_view',$month)->first();

		if ($accRec) {
			$housing = $accRec->housing;
			$lp = $accRec->location_projects;
			$ta = $accRec->travel_allownace;
			$pa = $accRec->packing_allowance;
			$ms = $accRec->marriage_support;
			$bs = $accRec->bereavment_support;

			$twySenvenPnt = $housing + $lp;
			$odas = $ta+$pa+$ms+$bs;

			$prevBal = $twySenvenPnt - $odas;

			return $prevBal;
		}else{
			return 0;
		}

	}

	public function getExTotal()
	{
		$accRec = AccountReconciliation::where('location_id',$this->id)->where('year_in_view',date('Y'))->where('month_in_view',date('m'))->first();

		if ($accRec) {
			// $housing = $accRec->housing;
			// $lp = $accRec->location_projects;
			$ta = $accRec->travel_allownace;
			$pa = $accRec->packing_allowance;
			$ms = $accRec->marriage_support;
			$bs = $accRec->bereavment_support;

			// $twySenvenPnt = $housing + $lp;
			$total = $ta+$pa+$ms+$bs;

			return $total;
		}else{
			return 0;
		}
	}
	

}
