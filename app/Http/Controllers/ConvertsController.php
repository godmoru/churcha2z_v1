<?php

/*
Project: Membership/Information Management Software - Dunamis International Gospel Center, Abuja
File Name: Converts Controller 
Description: Core converts management functionalities controller.
Author: Umoru Godfrey, E. 
Address: GESUSOFT Technology, Abuja Nigeria
godfrey.umoru@gesusoft.com
Date Created: 16th September, 2018.
*/

namespace App\Http\Controllers;

ini_set('max_execution_time', 3000);
ini_set('memory_limit', '-1');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ConvertsController extends Controller
{
    	/* People Controllers */

	public function __construct()
	{
		$this->middleware('auth');
	}
	public function allconverts(){

    	$param['pageName'] = "Converts Global List";
    	if (\Auth::user()->location_id == 1) {
    	$param['converts'] = \App\People::where('status',1)->orderBy('fullnames', 'asc')->orderBy('service_date', 'asc')->orderBy('location_id','asc')->get();
    	}else{
    	    $param['converts'] = \App\People::where('location_id',\Auth::user()->location_id)->orderBy('fullnames', 'asc')->orderBy('service_date', 'asc')->orderBy('location_id','asc')->get();
    	}
    	$param['allnewconverts'] = \App\People::where('people_category_id',1)->get();
    	$param['newconverts'] = \App\People::where('people_category_id',1)->where('location_id',\Auth::user()->location_id)->get();
    	$param['firsttimers'] = \App\People::where('people_category_id',2)->where('location_id',\Auth::user()->location_id)->get();
    	// $param['converts'] = \App\People::where('status',1)->whereBetween('create_at', ['2018-10-24 00:00:00', \Carbon\Carbon::now()->format('Y-m-d')])->orderBy('location_id','asc')->get();
    	$param['peoplecats'] = \App\PeopleCategory::where('status',1)->orderBy('cat_name', 'asc')->get();
        $param['mstatus'] = \App\MaritalStatus::all();
        if(\Auth::user()->location_id == 1 || \Auth::user()->location_id == 221){
            $param['districts'] = \App\District::where('status',1)->where('location_id', 1)->orderBy('dis_name','asc')->get();
        }else
            {
                $param['districts'] = \App\District::where('status',1)->where('location_id', \Auth::user()->location_id)->orderBy('dis_name','asc')->get();
            }
        $param['depts'] = \App\Workforcedept::all();
        $param['pas'] = \App\PeopleAwarenessSource::all();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::where('id',1)->get();
        } else {
            $param['services'] = \App\Service::all();
        }

        flash()->success('Welcome to the converts index page');
		return view('members.converts.globalindex', $param);	
	}

	public function converts(){

    	$param['pageName'] = "My Location Converts List";
    	if (\Auth::user()->location_id == 1) {
    	$param['converts'] = \App\People::where('status',1)->orderBy('service_date', 'desc')->orderBy('location_id','asc')->get();
    	} else {
    		$param['converts'] = \App\People::where('status',1)->where('location_id', \Auth::user()->location_id)->orderBy('fullnames','asc')->get();
    	}
    	
    	// $param['converts'] = \App\People::where('status',1)->orderBy('location_id','asc')->get();
    	$param['allnewconverts'] = \App\People::where('people_category_id',1)->get();
    	$param['newconverts'] = \App\People::where('people_category_id',1)->where('location_id',\Auth::user()->location_id)->get();
    	$param['firsttimers'] = \App\People::where('people_category_id',2)->where('location_id',\Auth::user()->location_id)->get();
    	// $param['converts'] = \App\People::where('status',1)->whereBetween('create_at', ['2018-10-24 00:00:00', \Carbon\Carbon::now()->format('Y-m-d')])->orderBy('location_id','asc')->get();
    	$param['peoplecats'] = \App\PeopleCategory::where('status',1)->orderBy('cat_name', 'asc')->get();
        $param['mstatus'] = \App\MaritalStatus::all();
        $param['depts'] = \App\Workforcedept::all();
        // $param['districts'] = \App\District::where('status',1)->where('location_id', \Auth::user()->location_id)->orderBy('dis_name','asc')->get();
        if(\Auth::user()->location_id == 1 || \Auth::user()->location_id == 221){
            $param['districts'] = \App\District::where('status',1)->where('location_id', 1)->orderBy('dis_name','asc')->get();
        }else
            {
                $param['districts'] = \App\District::where('status',1)->where('location_id', \Auth::user()->location_id)->orderBy('dis_name','asc')->get();
            }
        $param['pas'] = \App\PeopleAwarenessSource::all();
        // $param['services'] = \App\Service::where('status',1)->get();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }

        flash()->success('Welcome to the converts index page');
		return view('members.converts.index', $param);	
	}


public function dailysummary(){

    	$param['pageName'] = "My Location Converts Summary";
    	if (\Auth::user()->location_id == 1) {
    	$param['converts'] = \App\People::where('status',1)->orderBy('location_id','asc')->get();
    	} else {
    		$param['converts'] = \App\People::where('status',1)->where('location_id', \Auth::user()->location_id)->orderBy('fullnames','asc')->get();
    	}
    	
    	// $param['converts'] = \App\People::where('status',1)->orderBy('location_id','asc')->get();
    	$param['allnewconverts'] = \App\People::where('people_category_id',1)->get();
    	$param['newconverts'] = \App\People::where('people_category_id',1)->where('location_id',\Auth::user()->location_id)->get();
    	$param['firsttimers'] = \App\People::where('people_category_id',2)->where('location_id',\Auth::user()->location_id)->get();
    	// $param['converts'] = \App\People::where('status',1)->whereBetween('create_at', ['2018-10-24 00:00:00', \Carbon\Carbon::now()->format('Y-m-d')])->orderBy('location_id','asc')->get();
    	$param['peoplecats'] = \App\PeopleCategory::where('status',1)->orderBy('cat_name', 'asc')->get();
        $param['mstatus'] = \App\MaritalStatus::all();
        $param['depts'] = \App\Workforcedept::all();
        $param['pas'] = \App\PeopleAwarenessSource::all();
        // $param['services'] = \App\Service::where('status',1)->get();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }

        flash()->success('Welcome to the converts summary page');
		return view('members.converts.dailysummary', $param);	
	}
	
	public function showReg()
	{
		$param['pageName'] = "Converts Registration";
		$param['peoplecats'] = \App\PeopleCategory::where('status',1)->orderBy('cat_name', 'asc')->get();
        $param['mstatus'] = \App\MaritalStatus::all();
        // $param['districts'] = \App\District::where('status',1)->where('location_id', \Auth::user()->location_id)->orderBy('dis_name','asc')->get();
        if( \Auth::user()->location_id == 1 || \Auth::user()->location_id == 221){
            $param['districts'] = \App\District::where('status',1)->where('location_id', 1)->orderBy('dis_name','asc')->get();
        }else
            {
                $param['districts'] = \App\District::where('status',1)->where('location_id', \Auth::user()->location_id)->orderBy('dis_name','asc')->get();
            }

        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }
		return view('members.converts.addnew', $param);	
	}
	

	public function categories()
	{
		$param['pageName'] = "People Categories";
    	//$param['categories'] = \App\PeopleCategory::all();
    	$param['categories'] = \App\PeopleCategory::where('status',1)->orderBy('cat_name','asc')->get();
		return view('members.converts.categories', $param);	
		
	}

	public function newcategory()
	{
		$ip = Input::all();

	  	$cat = New \App\PeopleCategory;
	  	$cat->cat_name = $ip['catname'];
	  	$cat->short_name = $ip['catname'];
	  	$cat->status = 1;
	 	$cat->save();
	 	return redirect()->back();
	}
	
	
	public function oneCat($id)
	{
        $id = \Crypt::decrypt($id);
    	$param['category'] = \App\PeopleCategory::find($id);
		$param['pageName'] = $param['category']->cat_name;
		return view('members.converts.onecategory', $param);	
	}

	public function deleteCat()
	{
		$ip = Input::all();
    	$cat = \App\PeopleCategory::find($ip['catId']);
    	$cat->delete();
    	return redirect()->route('peoplecategories');	
	}


	public function editcategory()
	{
		$ip = Input::all();

    	$cat = \App\PeopleCategory::find($ip['catId']);
	  	$cat->cat_name = $ip['catname'];
	  	$cat->short_name = $ip['catname'];
	  	$cat->description = $ip['description'];
	  	$cat->status = 1;
	 	$cat->update();
	 	return redirect()->back();
	}
	
	public function showsearch()
	{
		$param['pageName'] = "Converts Search Page";
    	// if (\Auth::user()->location_id == 1) {
    	$param['converts'] = \App\People::where('status',1)->orderBy('location_id','asc')->get();
    	$param['allnewconverts'] = \App\People::where('people_category_id',1)->get();
    	$param['newconverts'] = \App\People::where('people_category_id',1)->where('location_id',\Auth::user()->location_id)->get();
    	$param['firsttimers'] = \App\People::where('people_category_id',2)->where('location_id',\Auth::user()->location_id)->get();
    	// $param['converts'] = \App\People::where('status',1)->whereBetween('create_at', ['2018-10-24 00:00:00', \Carbon\Carbon::now()->format('Y-m-d')])->orderBy('location_id','asc')->get();
    	$param['peoplecats'] = \App\PeopleCategory::where('status',1)->orderBy('cat_name', 'asc')->get();
        $param['mstatus'] = \App\MaritalStatus::all();
        $param['depts'] = \App\Workforcedept::all();
        $param['pas'] = \App\PeopleAwarenessSource::all();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }
		return view('members.converts.seaerchconvertsR', $param);
	}
	

	public function searchconverts()
	{

		$inps = Input::all();
    	$param['pageName'] = "Converts List";
    	if ($inps['svc'] == 9000 && $inps['converttype'] == 9000) {
    		$param['converts'] = \App\People::where('status',1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->orWhere('fullnames', $inps['fullname'])->orWhere('marital_status_id', $inps['mstatus'])->where('id_gender', $inps['gender'])->orderBy('location_id','asc')->get();
    	} else {

    		$param['converts'] = \App\People::where('status',1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('people_category_id', $inps['converttype'])->where('service_id', $inps['svc'])->orderBy('location_id','asc')->get();
    		//$param['converts'] = \App\People::where('status',1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('people_category_id', $inps['converttype'])->where('service_id', $inps['svc'])->orWhere('fullnames', $inps['fullname'])->orWhere('marital_status_id', $inps['mstatus'])->where('id_gender', $inps['gender'])->orderBy('location_id','asc')->get();
    	}

    	// dd($param);
    	$param['peoplecats'] = \App\PeopleCategory::where('status',1)->orderBy('cat_name', 'asc')->get();
        $param['mstatus'] = \App\MaritalStatus::all();
        // $param['depts'] = \App\Workforcedept::all();
        // $param['pas'] = \App\PeopleAwarenessSource::all();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::where('id',1)->get();
        } else {
            $param['services'] = \App\Service::all();
        }
        // flash()->success('Welcome to the converts index page');
		return view('members.converts.searchedindex', $param);	
		// view('members.converts.searched', $param);
            // $pdf = \PDF::loadView('members.converts.searched', ['converts' => $param['converts']], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'landscape');
            // return $pdf->stream(''.date('d-m-Y').'-QueryResult.pdf');

	}

	public function copyphonenos()
	{

		$inps = Input::all();
    	$param['pageName'] = "Converts List";
    	if ($inps['svc'] == 9000 && $inps['converttype'] == 9000) {
    		$param['converts'] = \App\People::where('status',1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->orWhere('fullnames', $inps['fullname'])->orWhere('marital_status_id', $inps['mstatus'])->where('id_gender', $inps['gender'])->orderBy('location_id','asc')->pluck('phone1');
    	} else {

    		$param['converts'] = \App\People::where('status',1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('people_category_id', $inps['converttype'])->where('service_id', $inps['svc'])->orWhere('fullnames', $inps['fullname'])->orWhere('marital_status_id', $inps['mstatus'])->where('id_gender', $inps['gender'])->orderBy('location_id','asc')->pluck('Phone1');
    	}
    	dd($param['converts']);

        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }

        // flash()->success('Welcome to the converts index page');
		return view('members.converts.searchedindex', $param);	
		// view('members.converts.searched', $param);
            // $pdf = \PDF::loadView('members.converts.searched', ['converts' => $param['converts']], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'landscape');
            // return $pdf->stream(''.date('d-m-Y').'-QueryResult.pdf');

	}


	public function firsttimers(){

    	$param['pageName'] = "First Timers Index";
    	$param['converts'] = \App\People::where('status',1)->where('people_category_id', 2)->orderBy('location_id','asc')->get();
    	// $param['peoplecats'] = \App\PeopleCategory::all();
     //    $param['mstatus'] = \App\MaritalStatus::all();
     //    $param['depts'] = \App\Workforcedept::all();
     //    $param['pas'] = \App\PeopleAwarenessSource::all();
     //    $param['services'] = \App\Service::all();

        flash()->success('Welcome to the first timers index page');
		return view('members.converts.firsttimers', $param);	
	}

	public function newconverts(){

    	$param['pageName'] = "New Converts Index";
    	$param['converts'] = \App\People::where('status',1)->where('people_category_id', 1)->orderBy('location_id','asc')->get();
    	// $param['peoplecats'] = \App\PeopleCategory::all();
        $param['mstatus'] = \App\MaritalStatus::all();
     //    $param['depts'] = \App\Workforcedept::all();
     //    $param['pas'] = \App\PeopleAwarenessSource::all();
     //    $param['services'] = \App\Service::all();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }


        flash()->success('Welcome to the new converts index page');
		return view('members.converts.newconverts', $param);	
	}



	public function newconvert()
	{
		$pdata = Input::all();
		
		$ppl = new \App\People; //Creating new instance of the Poeple Class thereby creating a new convert in the database.

		if ($pdata['converttype'] == 1) {
			$ppl->seek_code = "DCV-".mt_rand(435678,4345653);	
		} 
		elseif ($pdata['converttype'] == 2) {
			$ppl->seek_code = "DFT-".mt_rand(435678,4345653);	
		}
		else {
			$ppl->seek_code = "DRED-".mt_rand(435678,4345653);	
		}

		$ppl->fullnames = $pdata['sname'].' '.$pdata['othernames'];
        $ppl->surname = $pdata['sname'];   
		$ppl->othernames = $pdata['othernames'];
		$ppl->service_id = $pdata['svc'];	
		$ppl->service_date = \Carbon\Carbon::now()->format('Y-m-d');	
		$ppl->location_id = \Auth::user()->location_id;	
		$ppl->id_gender = $pdata['gender'];	
		$ppl->marital_status_id = $pdata['mstatus'];
		$ppl->location_area_id = $pdata['area_in'];		
		$ppl->res_address = $pdata['resaddress'];	
		//$ppl->dob = $pdata['dob'];	
		$ppl->phone1 = $pdata['phone1'];	
		$ppl->phone2 = $pdata['phone2'];	
		$ppl->people_category_id = $pdata['converttype'];	
		$ppl->fclass_status = 2;	
		$ppl->dltc_status = 2;	
		$ppl->dusom_status = 2;	
		$ppl->membership_decision = 1;
		$ppl->save();
		$uname = "naanpan";
    	$pwd = "mylord1978";
    	
    	if ($pdata['converttype'] == 1) {
    		$msg = "Congrat! ". $pdata['sname'] ." This decision to surrender your life to Christ marks a new begining in your life. Pls locate a Dunamis Home Church near U & enrol in foundation Class. Bless U.";
    	} else {
    		$msg = "Hi ". $pdata['sname'] ." Thank you for your presence in Dunamis Church today. We are sure God ministered to you. We hope to see more of you. God bless you richly in Jesus Name.";
    	}
    	
    // 	if ($pdata['converttype'] == 1) {
    // 		$msg = "Congrat! This decision to surrender your life to Christ marks a new begining in your life. Pls locate a Dunamis Home Church near U & enrol in foundation Class. Bless U.";
    // 	} else {
    // 		$msg = "Thank you for your presence in Dunamis Church today. We are sure God ministered to you. We hope to see more of you. God bless you richly in Jesus Name.";
    // 	}
    	$sender = "Dunamis HQ";
    	$recipient = "08165420728,".$pdata['phone1'];
    	// $recipient = $pdata['phone1'];
		$sms_url = 'https://netbulksms.com/index.php?option=com_spc&comm=spc_api&username=naanpan&password=mylord1978&sender=DunamisHQ&recipient=' . $recipient . '&message=' . urlencode($msg);
// 		$sms_url = 'https://netbulksms.com/index.php?option=com_spc&comm=spc_api&username=GESUMAYOR&password=nanoplus85&sender=DunamisHQ&recipient=' . $recipient . '&message=' . urlencode($msg);
		if(\Auth::user()->location_id ==  1 || \Auth::user()->location_id == 221){
		  $sms = file_get_contents($sms_url);
		return redirect()->back();  
		}
		else{
		    return redirect()->back();
		}
		
	}


	public function oneConvert($id)
	{
        $id = \Crypt::decrypt($id);
		$param['convert'] = \App\People::find($id);
    	$param['pageName'] = $param['convert']->fullnames."'s Profile";
        // $param['peoplecats'] = \App\PeopleCategory::all();
    	$param['peoplecats'] = \App\PeopleCategory::where('status',1)->orderBy('cat_name', 'asc')->get();
        $param['mstatus'] = \App\MaritalStatus::all();
        $param['depts'] = \App\Workforcedept::all();
        $param['pas'] = \App\PeopleAwarenessSource::all();
        $param['classbatch'] = \App\FoundationClass::all();
        // $param['services'] = \App\Service::all();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }
        
		return view('members.converts.one', $param);

	}

	public function updateconvert()
	{
		$pdata = Input::all();
		$ppl = \App\People::find( $pdata['convertId']); //Updating the found instance of the Poeple Class thereby editing a convert in the database.
		$ppl->fullnames = $pdata['fullname'];	
		$ppl->service_id = $pdata['svc'];	
		$ppl->service_date = \Carbon\Carbon::now()->format('Y-m-d');	
		$ppl->location_id = \Auth::user()->location_id;	
		$ppl->id_gender = $pdata['gender'];	
		$ppl->marital_status_id = $pdata['mstatus'];	
		$ppl->res_address = $pdata['resaddress'];
		$ppl->location_area_id = $pdata['area_id'];		
		// $ppl->dob = $pdata['dob'];	
		$ppl->phone1 = $pdata['phone1'];	
		$ppl->phone2 = $pdata['phone2'];	
		$ppl->people_category_id = $pdata['converttype'];	
		$ppl->fclass_status = 2;	
		$ppl->dltc_status = 2;	
		$ppl->dusom_status = 2;	
		$ppl->membership_decision = 1;
		$ppl->email = $pdata['email'];	
		// $ppl->people_awareness_source_id = $pdata['awarenesssource'];	
		// $ppl->occupation = $pdata['occupation'];	
		// $ppl->job_title = $pdata['jobtitle'];	
		// $ppl->occupation = $pdata['occupation'];	
		// $ppl->office_bus_address = $pdata['officeaddress'];
		// $ppl->pastoral_visit_day = $pdata['pvistiday'];
		// $ppl->pastoral_visit_time = $pdata['pvistittime'];
		// $ppl->immediate_prayer_request = $pdata['immediateprayerneeds'];
		// dd($ppl);
		$ppl->save();
		
		// $sender = "DunamisHQ"; 
  //       $sendto = $pdata['phone1'];
  //       $username = "GESUMAYOR";
  //       $pass = "Godfreyneedle85";
  //       $msg = "You are welcome to Dunamis Int'l. Gospel Center. A place where destiny are restored and human dignity is .... Thank you";
  //       fopen("http://api.smartsmssolutions.com/smsapi.php?username=$username&password=$pass&sender=$sender&recipient=$sendto&message=$msg", "r");
        
        flash()->success('Convert '.  $ppl->fullname.' information has successfully been updated on the system');
		return redirect()->back();	
	}

	public function peopledashboard(){

			$data['people'] = \App\People::all();
			$data['members'] = \App\People::count();
			$data['firsttimers'] = \App\People::Where('id_cat', '=', '1')->count();
			$data['newconverts'] = \App\People::Where('id_cat', '=', '2')->count();
			$data['locations_all'] = \App\Location::count();
			//var_dump($data['people'[]]);exit();
			return view('admin.peopledashboard')->with($data);
	}
	
	public function get_by_criterias()
    {
        $inps = Input::all();
        $did = \App\District::find($inps['district']);

        if ($inps['converttype'] == 9999) {
            $converts = \App\People::where('status',1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->Where('location_area_id', $inps['district'])->get();
        } else {
            $converts = \App\People::where('status',1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->Where('location_area_id', $inps['district'])->Where('people_category_id', $inps['converttype'])->get();
        }
            view('dhc.districts.printdistrictconverts', $converts);
            $pdf = \PDF::loadView('dhc.districts.printdistrictconverts', ['converts' => $converts], ['district' => $did], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'portrait');
            // return $pdf->download(''.date('d-m-Y').'-converts.pdf');
            return $pdf->stream(''.date('d-m-Y').'-converts.pdf');
    }
    

	public function del_people(){

		return view('admin.del_people');
	}

	public function add_people(){

			$data['peoplecat'] = PeopleCat::All();
			$data['genders'] = Gender::all();
			$data['people'] = People::all();
			$data['members'] = People::count();
			$data['firsttimers'] = People::Where('id_cat', '=', '1')->count();
			$data['newconverts'] = People::Where('id_cat', '=', '2')->count();
			$data['evangelism'] = People::Where('id_cat', '=', '3')->count();
// 			$data['outreach_crusades'] = People::Where('id_cat', '=', '5)->count();
			$data['p_convinced'] = People::Where('id_cat', '=', '4')->count();
			$data['tv'] = People::Where('id_cat', '=', '6')->count();
			$data['internet'] = People::Where('id_cat', '=', '8')->count();
			$data['radio'] = People::Where('id_cat', '=', '7')->count();
			$data['phonesms'] = People::Where('id_cat', '=', '9')->count();
			$data['locations_all'] = Location::count();
			return view('admin.addpeople')->with($data);
	}

	public function findConvert()
	{
		$post = Input::all();
        $phone = \App\People::where('phone1', '=', $post['phone'])->orWhere('phone2', '=', $post['phone'])->where('fclass_status',2)->get();
        return json_encode($phone);
	}

/**
     * Store a new pepx.
     *
     * @param  Request  $request
     * @return Response
     */

	public function create_people()

	{
		$pepx = Input::all();
	  $pepx = New People;
	  $pepx->pname = Input::get('pname');
	  $pepx->email = Input::get('email');
	  $pepx->phone1 = Input::get('phone');
	  $pepx->id_gender = Input::get('gender');
	  $pepx->res_address = Input::get('res_address');
	  $pepx->location = 1;//Input::get('location');
	  $pepx->id_loc = 2;
	  //$pepx->id_state = 7;
	  $pepx->id_cat = Input::get('cat');
	  $pepx->fclass_status = 2;
	  $pepx->dltc_status = 2;
	  $pepx->isMember = 2;

	 $pepx->save();
	
	$data['peoplecat'] = PeopleCat::All();
	$data['genders'] = Gender::all();
	$data['people'] = People::all();

	return redirect('/people/add')->with('message', 'New person created successfully', $data);
	}


	public function edit_people($id)
        {
            if($id)
           	 {
                $ppx = People::find($id);
                $ppx->fname = $request['fname'];
                $ppx->mname = $request['mname'];
                $ppx->lname = $request['lname'];
                $ppx->email = $request['email'];
                $ppx->phone1 = $request['phone1'];
                $ppx->phone2 = $request['phone2'];
                $ppx->fclass_status = $request['fclass'];
                $ppx->dltc_status = $request['dltc'];
                $ppx->update();
                dd($ppx);exit();

                 return redirect('/people/profile/'.$ppx->id)->with('message','"'.$request['fname'].'" Edited');
              }
                     
            return redirect('/location/dashboard')->with('message','Nothing to edit for the selected person, try again!');
        } 


	public function getpepx($id)
	    {
            if($id)
            {
                $pagedata['people'] = People::find($id);
               return view('admin.peopleProfile',$pagedata);
            }
            return redirect()->with('message','No profile to view');
       }
    	public function editpepx($id)
	    {
            if($id)
            {
                $pagedata['people'] = People::find($id);
               return view('admin.editMember',$pagedata);
            }
            return redirect()->with('message','No Member to edit');
       }

               public function delete_people($id)
        {
            if($id){
                $pepx = People::find($id);
                $pepx->delete();
                return redirect('location/dashboard')->with('message','"'.$pepx->fname.'" deleted from the system');
            }
            return redirect('users/users')->with('message','Nothing to delete');
        }


	public function people_analysis(){

		return view('admin.people_analysis');
	}


    public function printConverts(Request $request)
    {
        $converts = \DB::select("SELECT c.fullnames AS fullnames, c.id, c.service_id as Service, c.location_id as LocationId, c.res_address AS res_address, c.phone1 AS Phone1, c.email as email, c.dob AS DOB, c.fclass_status AS fclass_status, c.dltc_status AS dltc_status, c.membership_decision as membership_decision, u.location_id as ULoc, l.loc_name as Location, cat.short_name AS Category from people c LEFT JOIN locations l ON c.location_id = l.id LEFT JOIN people_categories cat ON c.people_category_id = cat.id LEFT JOIN users u ON c.location_id = u.location_id  limit 50" );//->where('location_id', \Auth::user()->location_id)->get();
        // dd($converts);
        view('members.converts.printconverts', $converts);
            
            $pdf = \PDF::loadView('members.converts.printconverts', ['converts' => $converts], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'landscape');
            return $pdf->download(''.date('d-m-Y').'-converts.pdf');
            // return $pdf->stream(''.date('d-m-Y').'-converts.pdf');
    }

    public function printTodayConverts()
    {
    // $converts = \DB::select("SELECT c.fullnames AS fullnames, c.id, c.service_id as Service, c.phone1 AS Phone1, c.email as email, c.dob AS DOB, c.fclass_status AS fclass_status, c.dltc_status AS dltc_status, c.membership_decision as membership_decision, l.loc_name as Location, cat.short_name AS Category from people c LEFT JOIN locations l ON c.location_id = l.id LEFT JOIN people_categories cat ON c.people_category_id = cat.id where c.service_date =".\Carbon\Carbon::now()->format('Y-m-d') );
        $converts = \App\People::where('location_id', \Auth::user()->location_id)->where('fclass_status',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();

        view('members.converts.printconverts', $converts);
            $pdf = \PDF::loadView('members.converts.printconverts', ['converts' => $converts], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'landscape');
            //return $pdf->download(''.date('d-m-Y').'-converts.pdf');
           return $pdf->stream(''.date('d-m-Y').'-converts.pdf');
    }

    public function printTodaynewConverts(Request $request)
    {
    // $converts = \DB::select("SELECT c.fullnames AS fullnames, c.id, c.service_id as Service, c.phone1 AS Phone1, c.email as email, c.dob AS DOB, c.fclass_status AS fclass_status, c.dltc_status AS dltc_status, c.membership_decision as membership_decision, l.loc_name as Location, cat.short_name AS Category from people c LEFT JOIN locations l ON c.location_id = l.id LEFT JOIN people_categories cat ON c.people_category_id = cat.id where c.service_date =".\Carbon\Carbon::now()->format('Y-m-d') );
        $converts = \App\People::where('location_id', \Auth::user()->location_id)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();

        view('members.converts.printconverts', $converts);
            $pdf = \PDF::loadView('members.converts.printnewconverts', ['converts' => $converts], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'landscape');
            return $pdf->stream(''.date('d-m-Y').'-converts.pdf');
            // return $pdf->stream(''.date('d-m-Y').'-converts.pdf');
    }

    public function printTodayFirstTimers(Request $request)
    {
    // $converts = \DB::select("SELECT c.fullnames AS fullnames, c.id, c.service_id as Service, c.phone1 AS Phone1, c.email as email, c.dob AS DOB, c.fclass_status AS fclass_status, c.dltc_status AS dltc_status, c.membership_decision as membership_decision, l.loc_name as Location, cat.short_name AS Category from people c LEFT JOIN locations l ON c.location_id = l.id LEFT JOIN people_categories cat ON c.people_category_id = cat.id where c.service_date =".\Carbon\Carbon::now()->format('Y-m-d'));
        $converts = \App\People::where('location_id', \Auth::user()->location_id)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();

        view('members.converts.printconverts', $converts);
            $pdf = \PDF::loadView('members.converts.printfirsttimers', ['converts' => $converts], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'landscape');
            return $pdf->stream(''.date('d-m-Y').'-firsttimers.pdf');
    }


    public function getBulkSMS()
    {
    	//GET New Converts Phone No\\
        $param['converts'] = \App\People::where('status',1)->orderBy('location_id','asc')->get();

        $param['newconverts'] = \App\People::where('people_category_id',1)->get();
        $param['firststsvcconverts'] = \App\People::where('service_id',1)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['secstsvcconverts'] = \App\People::where('service_id',2)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['thirdstsvcconverts'] = \App\People::where('service_id',3)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['fouthsvcconverts'] = \App\People::where('service_id',4)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['fifthsvcconverts'] = \App\People::where('service_id',5)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['sixthsvcconverts'] = \App\People::where('service_id',6)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();

        //GET First Timers Phone No\\
        $param['firsttimers'] = \App\People::where('people_category_id',2)->get();
        $param['fttmrs'] = \App\People::where('service_id',1)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['sectmrs'] = \App\People::where('service_id',2)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['thirdtmrs'] = \App\People::where('service_id',3)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['forthtmrs'] = \App\People::where('service_id',4)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['fifttmrs'] = \App\People::where('service_id',5)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['sixtmrs'] = \App\People::where('service_id',6)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();

        $param['peoplecats'] = \App\PeopleCategory::where('status',1)->orderBy('cat_name', 'asc')->get();
        return view('members.converts.bulksms', $param);
    }


  public function grabContacts()
    {
        $inps = Input::all();
        if ($inps['converttype'] == 9999) {
            $param['converts'] = \App\People::where('status',1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->Where('location_id', \Auth::user()->location_id)->get();
        } else {
            $param['converts'] = \App\People::where('status',1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->Where('location_id', \Auth::user()->location_id)->Where('people_category_id', $inps['converttype'])->get();
        }
        $param['peoplecats'] = \App\PeopleCategory::where('status',1)->orderBy('cat_name', 'asc')->get();

        return view('members.converts.grabbedcontacts', $param);

    }


    public function sendSMS()
    {
    	
    }





}
