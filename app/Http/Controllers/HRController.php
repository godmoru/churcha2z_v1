<?php

/*
Project: Membership/Information Management Software - Dunamis International Gospel Center, Abuja
File Name: Human Resources Controller 
Description: Core HR, Pastors, pastors management functionalities controller.
Author: Umoru Godfrey, E. 
Address: GESUSOFT Technology, Abuja Nigeria
godfrey.umoru@gesusoft.com
Date Created: 16th September, 2018.
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use \App\Mail\PostingMail;


class HRController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function pastors()
    {
        $param['pastors'] = \App\Pastor::where('id', '!=', '')->orderBy('surname', 'asc', 'location_id','asc')->get();
        $param['zones'] = \App\GeoPolZone::all();
    	$param['pageName'] = "Resident Pastors List";
        $param['locs'] = \App\Location::all();
        $param['states'] = \App\State::all();
        $param['pcats'] = \App\PastorCategory::all();
        $param['tagno'] = mt_rand(9, 199999889);
        $param['ptype'] = \App\PastorType::where('id', '>',1)->get();
        $param['zones'] = \App\GeoPolZone::all();
        $param['mstatus'] = \App\MaritalStatus::all();
        $param['homecells'] = \App\Homecell::all();
        $param['depts'] = \App\Workforcedept::all();
        return view('hr.pastors.index', $param);
    }
    
    public function pastors2index()
    {
        $param['pastors'] = \App\Pastor::where('id', '!=', '')->orderBy('surname', 'asc', 'location_id','asc')->get();
        $param['pageName'] = "Resident Pastors List";
        return view('hr.pastors.2index', $param);
    }
    
    public function newpastorS()
    {
        $param['zones'] = \App\GeoPolZone::all();
        $param['pageName'] = "Add New Pastor";
        $param['locs'] = \App\Location::all();
        $param['states'] = \App\State::all();
        $param['pcats'] = \App\PastorCategory::all();
        $param['tagno'] = mt_rand(9, 199999889);
        $param['ptype'] = \App\PastorType::where('id', '>',1)->get();
        $param['zones'] = \App\GeoPolZone::all();
        $param['mstatus'] = \App\MaritalStatus::all();
        $param['homecells'] = \App\Homecell::all();
        $param['depts'] = \App\Workforcedept::all();

    	return view('hr.pastors.addnew', $param);
    }
    
    public function assignLoc()
    {

        $inps = Input::all();
        $pastor = \App\Pastor::find($inps['pastor']);
        $names = $pastor->surname . ' ' .$pastor->othernames;
        $location = \App\Location::find($inps['location']);
        $pastor->location_id = $inps['location']; // the desired location effecting posting to
        $pastor->update(); //Updating pastor posting information 
        SystemLog('Pastor Information', 'Modified Data', \Auth::user()->surname. ' modified ' .$pastor->surname. ' ' .$pastor->othernames."'s posting on the system", $_SERVER['REMOTE_ADDR']); //Log the activity to the system log
        
        flash()->success('You have assigned '. $pastor->surname . ' ' .$pastor->othernames. ' to '.$location->loc_name.', this assignment is successful. Thank you.');
        return back();
    }

    public function postPastor()
    {
        $inps = Input::all();
        // dd($inps);
        $pastor = \App\Pastor::find($inps['pastor']);
        $names = $pastor->surname . ' ' .$pastor->othernames;
        $location = \App\Location::find($inps['location']);

        if($pastor->userData){ //Check if pastor has been enabled to log in to the system
            $pastor->location_id = $inps['location']; // the desired location effecting posting to
            $pastor->update(); //Updating pastor posting information 

            $pUser = \App\User::find($pastor->userData->id); //Once pastor found to have a user account to access the system, find him/her from there
            $pUser->location_id = $inps['location']; //set his/her location to the desired location effecting posting to so he could log into the new location 
            $pUser->update(); //Updating pastor location to effect the proper location information
            flash()->success('You have successfully updated '. $pastor->surname . ' ' .$pastor->othernames. ' posting to '. $location->name.' as the location for him/her, thank you.');
        \Mail::to($pastor->email)->send(new PostingMail($names, $location->loc_name));
        SystemLog('Pastor Information', 'Modified Data', \Auth::user()->surname. ' modified ' .$pastor->surname. ' ' .$pastor->othernames."'s posting on the system", $_SERVER['REMOTE_ADDR']); //Log the activity to the system log
        return back();

        }else{ //Check if pastor has not been enabled to log in to the system
            
            flash()->success('You have enabled to login for '. $pastor->surname . ' ' .$pastor->othernames. ' before you can do this operation of effecting his/her posting, thank you.'); //notify the admin of the function to first of all enable login for the pastor before posting him/her to a location.
            return back();
        } 
    }
    
    public function modifyResponsibility()
    {
        $inps = Input::all();
        $pst = \App\Pastor::find($inps['pstid']);
        $pst->pastor_type_id = json_encode($inps['type_id']);
        $pst->update();
        flash()->success('You have successfully updated '. $pst->surname . ' ' .$pst->othernames. ' responsibility in the commission, thank you.');
        SystemLog('Pastor Information', 'Modified Data', \Auth::user()->surname. ' modified '.$pst->surname."'s responsibility on the system", $_SERVER['REMOTE_ADDR']);
        return back();

    }
    
    public function modifyCategory()
    {
        $inps = Input::all();
        $pst = \App\Pastor::find($inps['pstid']);
        $pst->pastor_category_id = $inps['category_id'];
        $pst->update();
        flash()->success('You have successfully updated '. $pst->surname . ' ' .$pst->othernames. ' category in the commission, thank you.');
        SystemLog('Pastor Information', 'Modified Data', \Auth::user()->surname. ' modified '.$pst->surname."'s category on the system", $_SERVER['REMOTE_ADDR']);
        return back();

    }
    
    
    public function onepastor($id)
    {
        $id = \Crypt::decrypt($id);
        $param['pastor'] = \App\Pastor::find($id);
        $param['pageName'] = $param['pastor']->surname. "'s Page";
        $param['locs'] = \App\Location::all();
        $param['locHis'] = \App\PastorLocationHistory::all();
        $param['states'] = \App\State::all();
        $param['zones'] = \App\GeoPolZone::all();
        $param['mstatus'] = \App\MaritalStatus::all();
        $param['homecells'] = \App\Homecell::all();
        $param['depts'] = \App\Workforcedept::all();
        $param['psttype'] = \App\PastorType::whereIn('id', [7,8,10])->get();
        $param['Stype'] = \App\StructureType::all();
        
        $param['locs'] = \App\Location::all();
        $param['categories'] = \App\PastorCategory::all();
        $param['locations'] = \App\Location::all();
         $param['pastors'] = \App\Pastor::all();
         
        $param['roles'] = \App\Role::all();
        return view('hr.pastors.onepastor', $param);
        
    }

    public function newPastor()
    {
        $inps = Input::all();
        $pstExists = \App\Pastor::whereEmail($inps['email'])->exists();
        if ($pstExists) {
               flash()->warning('This email '.$inps['email'].' already exists for a pastor in the database');
               return back();
        } else {
            
        $pastor = new \App\Pastor;
        $pastor->tag_no = $inps['tagno'];
        $pastor->surname = $inps['surname'];
        $pastor->othernames = $inps['othernames'];
        $pastor->dob = $inps['dob'];
        $pastor->email = $inps['email'];
        $pastor->phone1 = $inps['phone1'];
        $pastor->phone2 = $inps['phone2'];
        $pastor->resaddress = $inps['resaddress'];
        $pastor->state_id = $inps['state'];
        $pastor->lga_id = $inps['lga'];
        $pastor->transfer_status = $inps['transferstatus'];
        $pastor->pastor_type_id = json_encode($inps['type_id']);
        $pastor->pastor_category_id = $inps['category'];
        // $pastor->home_town = $inps['hometown'];
        $pastor->zone_id = 1;
        $pastor->location_id = null;//\Auth::user()->location_id;
        $pastor->date_ordained = $inps['dateordained'];
        if ($inps['confirmation_status'] == 1) {
                $pastor->confirmation_status = $inps['confirmation_status'];
                $pastor->date_confirmed = $inps['dateconfirmed'];
            } else {
                $pastor->confirmation_status = $inps['confirmation_status'];
                $pastor->date_confirmed = null;
            }
            
        // $pastor->date_confirmed = $inps['dateconfirmed'];
        $pastor->biography = $inps['biography'];
        $pastor->created_by = \Auth::user()->id;
        $pastor->status = 1;
        // dd($pastor);
        $pastor->save();
        
        // flash()->success('You have successfully added '. $inps['surname'] . ' ' .$inps['othernames']. ' to the pastorate of the commission, thank you.');
        // $msg = "Congrats!. You have been enrolled to the Church A-2-Z Platform of Dunamis International Gospel Center as Pastor to be in charge of a location. Pls contact the DIGC HQ Abuja for any enquiry or call (234) 816-5420-728. Thank U.";
        // $recipient = "08165420728,".$inps['phone1'];
        // $sms_url = 'https://netbulksms.com/index.php?option=com_spc&comm=spc_api&username=GESUMAYOR&password=nanoplus85&sender=DunamisHQ&recipient=' . $recipient . '&message=' . urlencode($msg);
        // $sms = file_get_contents($sms_url);
        return redirect()->back();
        }
    }
    
    public function pstPostings()
    {
        $param['pageName'] = "Pastor Posting Histories";
        $param['pastors'] = \App\Pastor::where('id', '!=', '')->orderBy('surname', 'asc', 'location_id','asc')->get();
        return view('hr.pastors.postinghistory', $param);
    }

    public function printpostingHistory()
    {
        $param['pageName'] = "Pastor Posting Histories";
        $param['pastors'] = \App\Pastor::where('id', '!=', '')->orderBy('surname', 'asc', 'location_id','asc')->get();
        return view('hr.pastors.printpostinghistories', $param);
    }
    
    public function updatePostingInfo()
    {
        $iN = Input::all();
        // dd($iN);
        
        // if ($iN['buildstructure'] == 1 && $iN['landsize'] == "") {
        //     flash()->warning('You cannot submit an empty land size seeing that you said you purchased land, please try again and fill the form carefully, thank you.');
        //     return back();
        // } else {
        
            $plh = new \App\PastorLocationHistory;
            $plh->location_id = $iN['location'];
            $plh->pastor_id = $iN['pastorId'];
            $plh->position = $iN['type_id'];
            $plh->date_from = $iN['dfrom'];
            $plh->date_to = $iN['dto'];
            $plh->numberical_attendance_average = $iN['maa'];
            
            // $plh->purchase_land = $iN['purchaseland'];
            // $plh->land_size = $iN['landsize'];
            if ($iN['purchaseland'] == 1) {
                $plh->purchase_land = $iN['purchaseland'];
                $plh->land_size = $iN['landsize'];
            } else {
                $plh->purchase_land = $iN['purchaseland'];
                $plh->land_size = null;
            }
    
            if ($iN['buildstructure'] == 1) {
                $plh->built_structure = $iN['buildstructure'];
                $plh->structure_type_id = json_encode($iN['built_type_id']);
                $plh->unfinished_structure_type_id = json_encode($iN['unfinished_built_type_id']);
            } else {
                $plh->built_structure = 2;
                $plh->structure_type_id = null;
                $plh->unfinished_structure_type_id = null;
            }
    
            if ($iN['renovatedstructure'] == 1) {
                $plh->renovated_structure = $iN['renovatedstructure'];
                $plh->ren_structure_type_id = json_encode($iN['ren_type_id']);
                $plh->unfinished_ren_structure_type_id = json_encode($iN['unfinished_ren_type_id']);
            } else {
                $plh->renovated_structure = 2;
                $plh->ren_structure_type_id = null;
                $plh->unfinished_ren_structure_type_id = null;
            }
    
            $plh->status = 1;
            // dd($plh);
            $plh->save();
            flash()->success('You have successfully updated your posting information on the system, thank you.');
            return back();
        // }
    }
    
    public function editPastorContactInfo()
    {
        $inps = Input::all();
        $pastor = \App\Pastor::find($inps['pastorId']);
        $pastor->surname = $inps['surname'];
        $pastor->othernames = $inps['othernames'];
        $pastor->email = $inps['email'];
        $pastor->phone1 = $inps['phone1'];
        $pastor->phone2 = $inps['phone2'];
        $pastor->resaddress = $inps['resaddress'];
        $pastor->update();
        if ($pastor->userData) {
            $user = \App\User::find($pastor->userData->id);
            $user->first_name = $inps['surname'];
            $user->last_name = $inps['othernames'];
            $user->email = $inps['email'];
            $user->phone_no = $inps['phone1'];
            $user->update();
        } else {
            # code...
            }
        
        flash()->success('You have successfully updated '. $pastor->surname .' '.$pastor->othernames. ' contact information on the system, thank you.');
        // $msg = "Congrats!. You have been enrolled to the Church A-2-Z Platform of Dunamis International Gospel Center as Pastor to be in charge of a location. Pls contact the DIGC HQ Abuja for any enquiry or call (234) 816-5420-728. Thank U.";
        // $recipient = "08165420728,".$inps['phone1'];
        // $sms_url = 'https://netbulksms.com/index.php?option=com_spc&comm=spc_api&username=GESUMAYOR&password=nanoplus85&sender=DunamisHQ&recipient=' . $recipient . '&message=' . urlencode($msg);
        // $sms = file_get_contents($sms_url);
        return redirect()->back();
    }
    
    public function printPastors()
    {
        $param['pastors'] = \App\Pastor::where('id', '>', '2')->orderBy('location_id', 'asc')->get();
        return view('hr.pastors.printlist', $param);
    }
    
    public function deetePst()
    {
        $inps = Input::all();
        $pastor = \App\Pastor::find($inps['pstid']);
        $pastor->delete();
        $user = \App\User::where('email',$inps['pstemail']);
        $loc = $pastor->get_loc;
        $loc->pastor_id = null;
        $loc->update();
        $user->delete();
        // $user->revokeRole('resident-pastor');
        flash()->success('You have successfully deleted '. $pastor->surname .' '.$pastor->othernames. ' information from the system, thank you.');
        return redirect()->route('pastors.index');
    
    }

    public function Workforcedept()
    {
        $param['depts'] = \App\Workforcedept::all();
        return view('workforce.index', $param);
    }

    public function newworkforcedept()
    {
        $inps = Input::all();
        $Workforcedept = new \App\Workforcedept;
        $Workforcedept->dept_name = $inps['name'];
        // $Workforcedept->dept_hod = $inps['hod'];
        $Workforcedept->dept_email = $inps['email'];
        $Workforcedept->dept_phone = $inps['phone'];

        $Workforcedept->dept_hod = $inps['hod'];
        $Workforcedept->hod_email = $inps['hodmail'];
        $Workforcedept->hod_phone = $inps['hodphone'];

        $Workforcedept->description = $inps['description'];
        // $Workforcedept->created_by = \Auth::user()->id;
        $Workforcedept->status = 1;
        // dd($Workforcedept);
        $Workforcedept->save();
        flash()->success('You have successfully created new Workforce Department to the work force department list');
        return redirect()->back();
    }

    public function onedept($id)
    {
        $id = \Crypt::decrypt($id);
        $param['dept'] = \App\Workforcedept::find($id);
        $param['locations'] = \App\Location::all();
        $param['people'] = \App\People::all();
        $param['homecells'] = \App\Homecell::all();
        $param['states'] = \App\State::all();
        $param['zones'] = \App\GeoPolZone::all();
        $param['mstatus'] = \App\MaritalStatus::all();
        $param['depts'] = \App\Workforcedept::all();


        $param['peoplecats'] = \App\PeopleCategory::where('status',1)->orderBy('cat_name', 'asc')->get();
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


        $param['pageName'] = $param['dept']->dept_name. "'s Page";
        return view('workforce.one', $param);
        
    }


    public function hods()
    {
        $param['hods'] = \App\Hod::all();
        $param['depts'] = \App\Workforcedept::all();
        $param['states'] = \App\State::all();
        $param['zones'] = \App\GeoPolZone::all();
        $param['mstatus'] = \App\MaritalStatus::all();

        return view('workforce.hods', $param);
    }

    public function newhod()
    {
        $inps = Input::all();
        $hod = new \App\Hod;
        $hod->surname = $inps['surname'];
        $hod->othernames = $inps['othernames'];
        $hod->dob = $inps['dob'];
        $hod->email = $inps['emailaddress'];
        $hod->phone1 = $inps['phone1'];
        $hod->phone2 = $inps['phone2'];
        $hod->resaddress = $inps['resaddress'];
        $hod->state_id = $inps['state'];
        $hod->lga_id = $inps['lga'];
        // $hod->zone_id = 1;
        $hod->location_id = \Auth::user()->location_id;
        $hod->date_provisioned = $inps['dateenlisted'];
        // $hod->date_confirmed = $inps['dateconfirmed'];
        $hod->biography = $inps['biography'];
        $hod->created_by = \Auth::user()->id;
        $hod->status = 1;
        // dd($hod);
        $hod->save();
        
        $Workforcedept = \App\Workforcedept::find($inps['dept']);
        $Workforcedept->dept_hod = $hod->id;
        $Workforcedept->update();


        flash()->success('You have successfully added '. $inps['surname'] . ' ' .$inps['othernames']. ' to the pastorate of the commission, thank you.');
        $msg = "Congrats!. You have been added to the Church A-2-Z Platform of Dunamis International Gospel Center as HOD to be in charge of a " .$Workforcedept->dept_name.". Pls contact the DIGC HQ Abuja for any enquiry or call (234) 816-5420-728. Thank U.";
        $recipient = "08165420728,".$inps['phone1'];
        $sms_url = 'https://netbulksms.com/index.php?option=com_spc&comm=spc_api&username=GESUMAYOR&password=nanoplus85&sender=DunamisHQ&recipient=' . $recipient . '&message=' . urlencode($msg);
        $sms = file_get_contents($sms_url);
        return redirect()->back();
    }
    
    // Accountants Here\\
    public function accountants()
    {
        $param['users'] = \App\User::all(); // select * from users
        $param['accountants'] = \App\Accountant::where('status', 1)->get(); // select * from accountnats where status = 1
        // $param['rolex'] = \App\Role::all();
        $param['rolex'] = \App\Role::where('id', '!=', 0)->orderBy('name', 'asc')->get();
        $param['permissions'] = \App\Permission::all();
        $param['pageName'] = "Accountants List";
        $param['states'] = \App\State::all();
        $param['locations'] = \App\Location::all();
        $param['tagno'] = mt_rand(9, 199999889);
        $param['mstatus'] = \App\MaritalStatus::all();
        $param['acctType'] = \App\AccountantType::all();
        SystemLog('Accountants', 'Accountants', \Auth::user()->first_name. ' '.\Auth::user()->last_name. ' viewed all Accountants information', $_SERVER['REMOTE_ADDR']);
        return view('hr.accountants.index', $param);
    }

    public function oneprofile($id)
    {
        $id = \Crypt::decrypt($id);
        $param['accountant'] = \App\Accountant::find($id);
        $param['rolex'] = \App\Role::where('id', '!=', 0)->orderBy('name', 'asc')->get();
        $param['permissions'] = \App\Permission::all();
        $param['pageName'] = $param['accountant']->surname. "'s Profile Page";
        $param['states'] = \App\State::all();
        $param['roles'] = \App\Role::all();
        $param['locs'] = \App\Location::all();
        $param['mstatus'] = \App\MaritalStatus::all();
        SystemLog('Accountants', 'Accountants', \Auth::user()->first_name. ' '.\Auth::user()->last_name. ' viewed all Accountants information', $_SERVER['REMOTE_ADDR']);
        return view('hr.accountants.oneprofile', $param);
    }


    public function newaccountant()
    {
        $inps = Input::all();
        $accountant = new \App\Accountant;
        $accountant->tag_no = $inps['tagno'];
        $accountant->surname = $inps['surname'];
        $accountant->othernames = $inps['othernames'];
        $accountant->dob = $inps['dob'];
        $accountant->email = $inps['email'];
        $accountant->phone1 = $inps['phone1'];
        $accountant->phone2 = $inps['phone2'];
        $accountant->resaddress = $inps['resaddress'];
        $accountant->state_id = $inps['state'];
        $accountant->lga_id = $inps['lga'];
        $accountant->location_id = $inps['location'];
        $accountant->transfer_status = $inps['transferstatus'];
        $accountant->accountant_type_id = json_encode($inps['type_id']);
        // $accountant->pastor_category_id = $inps['category'];
        // $accountant->home_town = $inps['hometown'];

        $accountant->location_id = null;//\Auth::user()->location_id;
        $accountant->date_taken = $inps['dateordained'];
        if ($inps['confirmation_status'] == 1) {
                $accountant->confirmation_status = $inps['confirmation_status'];
                $accountant->date_confirmed = $inps['dateconfirmed'];
            } else {
                $accountant->confirmation_status = $inps['confirmation_status'];
                $accountant->date_confirmed = null;
            }
        $accountant->biography = $inps['biography'];
        $accountant->created_by = \Auth::user()->id;
        $accountant->status = 1;
        // dd($accountant);
        $accountant->save();
        flash()->success('You have successfully added '. $inps['surname'] . ' ' .$inps['othernames']. ' to the accountants of the commission .');
        return redirect()->back();
        
    }

    public function edit()
    {
        // $id = \Crypt::decrypt($inps['tagno']);
        $inps = Input::all();
        $accountant = new \App\Accountant;
        $accountant->tag_no = $inps['tagno'];
        $accountant->surname = $inps['surname'];
        $accountant->othernames = $inps['othernames'];
        $accountant->dob = $inps['dob'];
        $accountant->email = $inps['email'];
        $accountant->phone1 = $inps['phone1'];
        $accountant->phone2 = $inps['phone2'];
        $accountant->resaddress = $inps['resaddress'];
        $accountant->state_id = $inps['state'];
        $accountant->lga_id = $inps['lga'];
        $accountant->transfer_status = $inps['transferstatus'];
        $accountant->pastor_type_id = json_encode($inps['type_id']);
        $accountant->pastor_category_id = $inps['category'];
        // $accountant->home_town = $inps['hometown'];
        $accountant->zone_id = 1;
        $accountant->location_id = null;//\Auth::user()->location_id;
        $accountant->date_ordained = $inps['dateordained'];
        if ($inps['confirmation_status'] == 1) {
                $accountant->confirmation_status = $inps['confirmation_status'];
                $accountant->date_confirmed = $inps['dateconfirmed'];
            } else {
                $accountant->confirmation_status = $inps['confirmation_status'];
                $accountant->date_confirmed = null;
            }
            
        // $accountant->date_confirmed = $inps['dateconfirmed'];
        $accountant->biography = $inps['biography'];
        $accountant->created_by = \Auth::user()->id;
        $accountant->status = 1;
        // dd($accountant);
        $accountant->save();
        
        flash()->success('You have successfully added '. $inps['surname'] . ' ' .$inps['othernames']. ' to the pastorate of the commission, thank you.');
        
        flash()->success('You have successfully edited '. $inps['surname'] . ' ' .$inps['othernames']. ' \'s information on the system.');
        return redirect()->back();
    }

    public function uploadImage()
    {
       
        $inputs = Input::all();
        $file = Input::file('image');
       if ($file !== "") {
             $img = $inputs['image'];
                $folderPath = base_path().'/public/images/accountants/'; // Destination Path
                $image_parts = explode(";base64,", $img);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = $inputs['counselorid']. '.png';
                $file = $folderPath . $fileName;
                file_put_contents($file, $image_base64);
               }
               flash()->success('You have successfully uploaded accountant\s image to the system');
        return redirect()->route('accountant.one', \Crypt::encrypt($inputs['counselorid']));
    }

    public function delete()
    {
        $inps = Input::all();
        $counselor = \App\Counselor::find($inps['counselorid']);
        $counselor->delete();
        SystemLog('Accountant', 'Accountant', \Auth::user()->first_name. ' '.\Auth::user()->last_name. ' Deleted '.$counselor->surname. ' records from the accountant information', $_SERVER['REMOTE_ADDR']);
        flash()->success('You have successfully Deleted ' .$counselor->surname. ' from the accountants list . Thank you.');
        return redirect()->route('accountants.index', \Crypt::encrypt(323423));
    }

    public function assignAcctLoc()
    {

        $inps = Input::all();
        // // dd($inps);
        $accountant = \App\Accountant::find($inps['accountant']);
        $accountant->location_id = $inps['location'];
        $accountant->update();
        flash()->success('You have successfully updated '. $accountant->surname . ' ' .$accountant->othernames. ' by assigning a location to him/her, thank you.');
        return back();

        // $accountant = \App\Accountant::find($inps['accountant']);
        // $names = $accountant->surname . ' ' .$accountant->othernames;
        // $location = \App\Location::find($inps['location']);

        // // $wef = \Carbon\Carbon::now()->addDays(7)->format("jS M, Y");
        
        // if($accountant->getUData){ //Check if accountant has been enabled to log in to the system
        //     $accountant->location_id = $inps['location']; // the desired location effecting posting to
        //     $accountant->update(); //Updating accountant posting information 

        //     $aUser = \App\User::find($accountant->getUData->id); //Once accountant found to have a user account to access the system, find him/her from there
        //     $aUser->location_id = $inps['location']; //set his/her location to the desired location effecting posting to so he could log into the new location 
        //     $aUser->update(); //Updating accountant location to effect the proper location information
        //     flash()->success('You have successfully updated '. $accountant->surname . ' ' .$accountant->othernames. ' by assigning a location to him/her, thank you.');
        // \Mail::to($accountant->email)->send(new PostingMail($names, $location->loc_name));
        // SystemLog('Pastor Information', 'Modified Data', \Auth::user()->surname. ' modified '.$accountant->surname . ' ' .$accountant->othernames."'s posting and login to location information on the system", $_SERVER['REMOTE_ADDR']); //Log the activity to the system log
        // return back();

        // }else{ //Check if accountant has not been enabled to log in to the system
            
        //     flash()->success('You have enabled login for '. $accountant->first_name . ' ' .$accountant->surname . ' ' .$accountant->othernames. ' first e enable login first then you can do this operation of effecting his/her posting, thank you.'); //notify the admin of the function to first of all enable login for the accountant before posting him/her to a location.
        //     return back();
        // }
        

    }
    
    public function postAcctountant(){
        
        $inps = Input::all();
        $accountant = \App\Accountant::find($inps['accountant']);
        $names = $accountant->surname . ' ' .$accountant->othernames;
        $location = \App\Location::find($inps['location']);

        // $wef = \Carbon\Carbon::now()->addDays(7)->format("jS M, Y");
        
        if($accountant->getUData){ //Check if accountant has been enabled to log in to the system
            $accountant->location_id = $inps['location']; // the desired location effecting posting to
            $accountant->update(); //Updating accountant posting information 

            $aUser = \App\User::find($accountant->getUData->id); //Once accountant found to have a user account to access the system, find him/her from there
            $aUser->location_id = $inps['location']; //set his/her location to the desired location effecting posting to so he could log into the new location 
            $aUser->update(); //Updating accountant location to effect the proper location information
            flash()->success('You have successfully updated '. $accountant->surname . ' ' .$accountant->othernames. ' by assigning a location to him/her, thank you.');
        \Mail::to($accountant->email)->send(new PostingMail($names, $location->loc_name));
        SystemLog('Accountant Information', 'Modified Data', \Auth::user()->surname. ' modified '.$accountant->surname . ' ' .$accountant->othernames."'s posting and login to location information on the system", $_SERVER['REMOTE_ADDR']); //Log the activity to the system log
        return back();

        }else{ //Check if accountant has not been enabled to log in to the system
            
            flash()->success('You have enabled login for '. $accountant->first_name . ' ' .$accountant->surname . ' ' .$accountant->othernames. ' first e enable login first then you can do this operation of effecting his/her posting, thank you.'); //notify the admin of the function to first of all enable login for the accountant before posting him/her to a location.
            return back();
        }
    }
 

 public function enableLogin()
    {
        $data = Input::all();
        $nU = new \App\User;
        $nU->first_name = $data['surname'];
        $nU->last_name = $data['othernames'];
        $nU->username = $data['username'];
        $nU->email = $data['email'];
        $nU->phone_no = $data['phoneno'];
        $nU->location_id = \Auth::user()->location_id;
        //Generatinga random password for the user
            $alphabet = "1234567890abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789@!"; //
            $pass = array(); // $pass as an array
            $alphaLength = strlen($alphabet) - 1; //the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
            }
        $nU->password = bcrypt(implode($pass));
        $nU->otp_key  = mt_rand(6, 654321);

        $nU->isVerify = 2;
        $nU->type = 4;
        $nU->status = 2;
        $nU->save();
        $nU->syncRoles($data['role_id']);
        $nU->syncPermissions($data['permission_id']);
        $password = implode($pass);
        $optCode = $nU->optCode;
        $names = $data['sname']. ' '.$data['onames'];
        // \Mail::to($data['email'])->send(new ActivationMail($data['email'],$password, $optCode, $names));
        SystemLog('System User', 'New User Data', \Auth::user()->first_name. ' added '.$nU->first_name."'s data to the system", $_SERVER['REMOTE_ADDR']);
       
        $uname = "GESUMAYOR";
        $pwd = "nanoplus85";
        $msg = "You have been enrolled on the Church A-2-Z platform of Dunamis International Gospel Center. Your details are as follows: email: " . $data['email']. " one time OTP Code is " . $optCode ." Your Password: ". $password ." It is valid for 120 minutes. Make sure you log in and update your account details on https://test.a2z.church . Thank you";
        // $msg = "Congrat! Your user account has been setup on the Dunamis Information eMembers Management System. Your credentials are as follows: Username: " .$data['email']. " Password: ".$pass." Your OneTimePassword to activate this account is ". $optCode." Thank You.";
        $sender = "DunamisHQ";
        $recipient = $data['phoneno'];
        $sms_url = 'https://netbulksms.com/index.php?option=com_spc&comm=spc_api&username=GESUMAYOR&password=nanoplus85&sender=DunamisHQ&recipient=' . $recipient . '&message=' . urlencode($msg);
        $sms = file_get_contents($sms_url);

        return redirect()->back()->with('message', 'Added '.$nU->surname.' '.$nU->othernames.' to the system users');

    }
}
