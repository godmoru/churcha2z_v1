<?php

/*
Project: Membership/Information Management Software - Dunamis International Gospel Center, Abuja
File Name: Members Controller 
Description: Core Members management functionalities controller.
Author: Umoru Godfrey, E. 
Address: GESUSOFT Technology, Abuja Nigeria
godfrey.umoru@gesusoft.com
Date Created: 16th September, 2018.
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class MembersController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 
	 public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index()
	{
		$param['pageName'] = "Members List";
    	$param['members'] = \App\Member::where('location_id', \Auth::user()->location_id)->get();
    	$param['locations'] = \App\Location::all();
        $param['people'] = \App\People::all();
        $param['homecells'] = \App\Homecell::all();
        $param['states'] = \App\State::all();
		$param['zones'] = \App\GeoPolZone::all();
		$param['mstatus'] = \App\MaritalStatus::all();
        $param['depts'] = \App\Workforcedept::all();
		$param['attendances'] = \App\Attendance::all();
		$param['members'] = \App\Member::all();
		$param['people'] = \App\People::all();
		$param['newconverts'] = \App\People::Where('people_category_id',1)->count();
		$param['firsttimers'] = \App\People::Where('people_category_id',2)->count();
			
		return view('members.index', $param);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	 
	 public function create()
	{
	
		$param['pageName'] = "Membership Registration";
		$param['peoplecats'] = \App\PeopleCategory::where('status',1)->orderBy('cat_name', 'asc')->get();
        $param['mstatus'] = \App\MaritalStatus::all();
        $param['states'] = \App\State::all();
        $param['homecells'] = \App\Homecell::all();
        $param['depts'] = \App\Workforcedept::all();
        $param['quals'] = \App\Qualification::all();
        $param['fos'] = \App\FieldOfStudy::all();
        $param['subfos'] = \App\SubFieldOfStudy::all();     
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::where('id',1)->get();
        } else {
            $param['services'] = \App\Service::all();
        }

        $sdate = 1951; //Start Year = defined year (1981)
        $edate = date("Y"); //End Year = Current Year
        $years = range ($sdate,$edate);
        $param['years'] = $years;
		return view('members.addnew', $param);	
	}
	
	public function store()
	{
		$pdata = Input::all();
		// dd($pdata);
		$mbr = new \App\Member; //Creating new instance of the Member Class thereby creating a new member in the database.
		$mbr->seek_code = "DMB-".mt_rand(4356,123456);	
		$mbr->sname = $pdata['surname'];	
		$mbr->othernames = $pdata['othernames'];	
		$mbr->location_id = \Auth::user()->location_id;	
		$mbr->gender = $pdata['gender'];
		$mbr->high_qual = $pdata['qual'];	
		$mbr->workforcedept_id = $pdata['deptId'];	
		if ($pdata['mstatus'] !== 2) {
            $mbr->marital_status_id = $pdata['mstatus'];	
			$mbr->m_anniversary = $pdata['manniversory'];

        } else {
            $mbr->marital_status_id = $pdata['mstatus'];	
			$mbr->m_anniversary = null;
        }

			
		$mbr->res_address = $pdata['mresaddress'];	
		$mbr->state_id = $pdata['state'];	
		$mbr->lga_id = $pdata['lga'];	
		$mbr->dob = $pdata['dob'];	
		$mbr->email = $pdata['email'];	
		$mbr->phone1 = $pdata['phone1'];	
		$mbr->phone2 = $pdata['phone2'];
		if ($pdata['fclass'] == 1) {
            $mbr->fclass_status = $pdata['fclass'];	
			$mbr->fclass_when = $pdata['fclass-when'];

        } else {
            $mbr->fclass_status = $pdata['fclass'];	
			$mbr->fclass_when = null;
        }
	
		if ($pdata['dltc'] == 1) {
            $mbr->dltc_status = $pdata['dltc'];	
			$mbr->dltc_when = $pdata['dltc-when'];

        } else {
            $mbr->dltc_status = $pdata['fclass'];	
			$mbr->dltc_when = null;
        }

        if ($pdata['dusom'] == 1) {
            $mbr->dusom_status = $pdata['dusom'];	
			$mbr->dusom_when = $pdata['dusom-when'];

        } else {
            $mbr->dusom_status = $pdata['dusom'];	
			$mbr->dusom_when = null;
        }

        if ($pdata['waterbaptism'] == 1) {
            $mbr->water_baptism = $pdata['waterbaptism'];	
			$mbr->water_baptism_when = $pdata['waterbaptism-when'];

        } else {
        	$mbr->water_baptism = $pdata['waterbaptism'];	
			$mbr->water_baptism_when = null;
        }
		$mbr->homecell_id = $pdata['homecell'];
		$mbr->status = 1;
		// dd($mbr);
		$mbr->save();

		$mbrEmpStatus = new \App\MemberEmploymentInfo;
		$mbrEmpStatus->member_id = $mbr->id; 
		$mbrEmpStatus->employment_status = $pdata['employmentstatus'];
		$mbrEmpStatus->office_business_name = $pdata['employmentname'];
		$mbrEmpStatus->office_business_address = $pdata['employmentaddress'];
		$mbrEmpStatus->status = 1;
		$mbrEmpStatus->save();

		$mbrQualInfo = new \App\MemberQualificationInfo;
		$mbrQualInfo->member_id = $mbr->id; 
		$mbrQualInfo->qualification_id = $pdata['qual'];
		$mbrQualInfo->field_of_study_id = $pdata['field_of_study'];
		$mbrQualInfo->sub_field_of_study_id = $pdata['sub_field_of_study'];
		$mbrQualInfo->year = $pdata['year'];
		$mbrQualInfo->status = 1;
		$mbrQualInfo->save();

		$mbrNOK = new \App\MemberNextOfKinInfo;
		$mbrNOK->member_id = $mbr->id; 
		$mbrNOK->surname = $pdata['noksurname'];
		$mbrNOK->othernames = $pdata['nokothernames'];
		$mbrNOK->email = $pdata['nokemail'];
		$mbrNOK->phone_no = $pdata['nokphone1'];
		if ($pdata['nokRel'] == 500) {
            $mbrNOK->relationship_id = $pdata['nokRel'];
            $mbrNOK->relationship_other_name = $pdata['nok_other_name'];
        } else {
            $mbrNOK->relationship_id = $pdata['nokRel'];
            $mbrNOK->relationship_other_name = null;
        }
        $mbrNOK->residential_address = $pdata['nokresaddress'];
		$mbrNOK->status = 1;
		$mbrNOK->save();

		$mbrPosting = new \App\MemberPosting;
		$mbrPosting->member_id = $mbr->id;
		$mbrPosting->workforcedept_id = $pdata['deptId'];
		$mbrPosting->posting_type = 1;
		$mbrPosting->posted_by = \Auth::user()->id;
		$mbrPosting->status = 1;
		$mbrPosting->save();
        flash()->success('You have successfully added '. $pdata['surname'] . ' ' .$pdata['othernames']. ' to the members of the commission through the department, thank you.');
		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function MbrPosting()
	{
		$postD = Input::all();
		$mbrPosting = new \App\MemberPosting;
		$mbrPosting->member_id = $postD['memberId'];
		$mbrPosting->workforcedept_id = $postD['newDept'];
		$mbrPosting->posting_type = 2;
		$mbrPosting->posted_by = \Auth::user()->id;
		$mbrPosting->status = 1;
		$dept = \App\Workforcedept::find($postD['newDept']);

		"DMB-".mt_rand(4356,123456);
		$mbrPosting->save();

			$msg = "Hi ". $postD['memberName'] ." , thank you for your interest in serving in the ". $dept->dept_name." department, your posting has been processed, visit the ". $dept->dept_name." office to confirm this posting with this code: ".$dept->short_name."-".mt_rand(54332, 1243598) ." to confirm your availability to serve in the department. We are sure God ministered to you. God bless you in Jesus Name.";

    	$sender = "Dunamis HQ";
    	$recipient = "08165420728,".$postD['memberPhone'];
		$sms_url = 'https://netbulksms.com/index.php?option=com_spc&comm=spc_api&username=GESUMAYOR&password=nanoplus85&sender=DunamisHQ&urlencode=' . $recipient . '&message=' . urlencode($msg);
		$sms = file_get_contents($sms_url);
        flash()->success('You have successfully posted '. $postD['memberName'] . ' to the '. $dept->dept_name .' department, thank you.');
		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $id = \Crypt::decrypt($id);
		
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	public function findperson()
	{
		$post = Input::all();
        $phone = People::where('phone1', '=', $post['phone'])->orWhere('phone2', '=', $post['phone'])->get();
        return json_encode($phone);
	}
	public function findmember()
	{
		$post = Input::all();
        $phone = People::where('phone1', '=', $post['phone'])->orWhere('phone2', '=', $post['phone'])->get();
        // $phone = Member::where('phone1', '=', $post['phone'])->get();
        return json_encode($phone);
	}

	public function fclassAddperson()
	{
		$post = Input::all();
		$id = $post['pid'];
		$pphone = $post['phone'];
        $prson = People::findOrFail($id);
        $prson->fclass_status = 1;
        $prson->fclass_by = Auth::user()->id;

        $prson->save();
        //Send Quick SMS 
            $owneremail="info@rtre.com.ng";
            $subacct="SUB1";
            $subacctpwd="3434554";
            $sendto=$pphone; /* destination number */
            
            $sender="Dunamis"; /* sender id */
            $message="Thank you for enrolling in the Dunamis Int'l. Gospel Center Foundation Class. Thank you"; /* message to be sent */
            /* the required URL */
            $url = "http://www.smslive247.com/http/index.aspx?"
            . "cmd=sendquickmsg" . "&owneremail=" . UrlEncode($owneremail) . "&subacct=" . UrlEncode($subacct)
            . "&subacctpwd=" . UrlEncode($subacctpwd) . "&message=" . UrlEncode($message) . "&sender=" . UrlEncode($sender)
            . "&sendto=" . UrlEncode($sendto) ."&msgtype=0";

            if ($f = @fopen($url, "r")) {
                $answer = fgets($f, 255);
                if (substr($answer, 0, 1) == "+")
                {
                    echo "SMS to $dnr was successful.";
                }
            else
                {
                    echo "an error has occurred: [$answer].";
                }
            }
            else
                {
                    echo "Error: URL could not be opened.";
                }
        return redirect('/foundation/class/add');

	}
	public function dltcadd()
	{
		$param['peoplecat'] = PeopleCat::all();
			$param['firsttimers'] = \App\People::Where('id_cat', '=', '1')->where('dltc_status', '=','1')->count();
			$param['newconverts'] = \App\People::Where('id_cat', '=', '2')->where('dltc_status', '=','1')->count();
			$param['evangelism'] = \App\People::Where('id_cat', '=', '3')->where('dltc_status', '=','1')->count();
			$param['outreach_crusades'] = \App\People::Where('id_cat', '=', '5')->where('dltc_status', '=','1')->count();
			//Male & Female First Timers
			$param['ft_male'] = \App\People::Where('id_cat', '=', '1')->where('dltc_status', '=','1')->where('id_gender', '=','1')->count();
			$param['ft_female'] = \App\People::Where('id_cat', '=', '1')->where('dltc_status', '=','1')->where('id_gender', '=','2')->count();
			
			//Male & Female New Converts
			$param['nc_male'] = \App\People::Where('id_cat', '=', '2')->where('dltc_status', '=','1')->where('id_gender', '=','1')->count();
			$param['nc_female'] = \App\People::Where('id_cat', '=', '2')->where('dltc_status', '=','1')->where('id_gender', '=','2')->count();
			
			//Male & Female Crusades & Outreaches
			$param['co_male'] = \App\People::Where('id_cat', '=', '5')->where('dltc_status', '=','1')->where('id_gender', '=','1')->count();
			$param['co_female'] = \App\People::Where('id_cat', '=', '5')->where('dltc_status', '=','1')->where('id_gender', '=','2')->count();
			
			//Male & Female Evangelism
			$param['ev_male'] = \App\People::Where('id_cat', '=', '3')->where('dltc_status', '=','1')->where('id_gender', '=','1')->count();
			$param['ev_female'] = \App\People::Where('id_cat', '=', '3')->where('dltc_status', '=','1')->where('id_gender', '=','2')->count();
			
			//Male & Female Crusades & Outreaches
			$param['co_male'] = \App\People::Where('id_cat', '=', '5')->where('dltc_status', '=','1')->where('id_gender', '=','1')->count();
			$param['co_female'] = \App\People::Where('id_cat', '=', '5')->where('dltc_status', '=','1')->where('id_gender', '=','2')->count();
			
			//Male & Female Radio & Television
			$param['rtv_male'] = \App\People::Where('id_cat', '=', '5')->where('id_cat', '=', '7')->where('dltc_status', '=','1')->where('id_gender', '=','1')->count();
			$param['rtv_female'] = \App\People::Where('id_cat', '=', '5')->where('id_cat', '=', '7')->where('dltc_status', '=','1')->where('id_gender', '=','2')->count();
			
		return view('admin.dltcadd', $param);
	}

	public function dltcAddperson()
	{
		$post = Input::all();
		$id = $post['pid'];
		$pphone = $post['phone'];
        $prson = People::findOrFail($id);
        $prson->dltc_status = 1;
        $prson->dltc_by = Auth::user()->id;
        $prson->save();
        //Send Quick SMS notifying the client of his/her order placement and processing for delivery or pickup 
            $owneremail="info@89787h.com.ng";
            $subacct="SUB1";
            $subacctpwd="needle2015";
            $sendto=$pphone; /* destination number */
            
            $sender="DunamisFC"; /* sender id */
            $message="Thank you for enrolling in the Dunamis Int'l. Gospel Center Foundation Class. Thank you"; /* message to be sent */
            /* the required URL */
            $url = "http://www.smslive247.com/http/index.aspx?"
            . "cmd=sendquickmsg" . "&owneremail=" . UrlEncode($owneremail) . "&subacct=" . UrlEncode($subacct)
            . "&subacctpwd=" . UrlEncode($subacctpwd) . "&message=" . UrlEncode($message) . "&sender=" . UrlEncode($sender)
            . "&sendto=" . UrlEncode($sendto) ."&msgtype=0";

            if ($f = @fopen($url, "r")) {
                $answer = fgets($f, 255);
                if (substr($answer, 0, 1) == "+")
                {
                    echo "SMS to $dnr was successful.";
                }
            else
                {
                    echo "an error has occurred: [$answer].";
                }
            }
            else
                {
                    echo "Error: URL could not be opened.";
                }
        return redirect('/dltc/class/add');

	}



	public function memberprofile($id)
	{
	    
	    $id = \Crypt::decrypt($id);
        $param['member'] = \App\Member::find($id);
        $param['pageName'] = $param['member']->sname ." ". $param['member']->othernames." Profile";
        $param['depts'] = \App\Workforcedept::all();
        return view('members.profile', $param);
    }





	/*
		End of sMember functions for admin controller
	*/
}
