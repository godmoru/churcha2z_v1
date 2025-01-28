<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class CounselorsController extends Controller
{
 	public function __construct()
 	{
 		$this->middleware('auth');
 	}
 	public function counselors()
 	{
 		$param['users'] = \App\User::all(); // select * from users
    	$param['counselors'] = \App\Counselor::where('status', 1)->get(); // select * from users where status = 1
        // $param['rolex'] = \App\Role::all();
        $param['rolex'] = \App\Role::where('id', '!=', 0)->orderBy('name', 'asc')->get();
        $param['permissions'] = \App\Permission::all();
        $param['pageName'] = "Counselor List";
        $param['states'] = \App\State::all();
        $param['tagno'] = mt_rand(9, 199999889);
        $param['mstatus'] = \App\MaritalStatus::all();
        SystemLog('Counselors', 'Counselors', \Auth::user()->first_name. ' '.\Auth::user()->last_name. ' viewed all Counselors information', $_SERVER['REMOTE_ADDR']);
        return view('hr.counselors.index', $param);
 	}

 	public function oneprofile($id)
 	{
        $id = \Crypt::decrypt($id);
 		
 		$param['counselor'] = \App\Counselor::find($id);
        $param['rolex'] = \App\Role::where('id', '!=', 0)->orderBy('name', 'asc')->get();
        $param['permissions'] = \App\Permission::all();
        $param['pageName'] = $param['counselor']->surname. "'s Profile Page";
        $param['states'] = \App\State::all();
        $param['roles'] = \App\Role::all();
        $param['mstatus'] = \App\MaritalStatus::all();
        $param['classbatch'] = \App\FoundationClass::all();
        SystemLog('Counselors', 'Counselors', \Auth::user()->first_name. ' '.\Auth::user()->last_name. ' viewed all Counselors information', $_SERVER['REMOTE_ADDR']);
        return view('hr.counselors.oneprofile', $param);
 	}


 	public function newcounselor()
 	{
        $inps = Input::all();
        $counselor = new \App\Counselor;
        $counselor->tag_no = $inps['tagno'];
        $counselor->surname = $inps['surname'];
        $counselor->othernames = $inps['othernames'];
        $counselor->dob = $inps['dob'];
        $counselor->email = $inps['emailaddress'];
        $counselor->phone1 = $inps['phone1'];
        $counselor->phone2 = $inps['phone2'];
        $counselor->resaddress = $inps['resaddress'];
        $counselor->state_id = $inps['state'];
        $counselor->lga_id = $inps['lga'];
        $counselor->home_town = $inps['hometown'];
        $counselor->zone_id = 1;
        $counselor->location_id = \Auth::user()->location_id;
        $counselor->date_enlisted = $inps['dateenlisted'];
        $counselor->date_confirmed = $inps['dateconfirmed'];
        $counselor->biography = $inps['biography'];
        $counselor->created_by = \Auth::user()->id;
        $counselor->status = 1;
        // dd($counselor);
        $counselor->save();
        flash()->success('You have successfully added '. $inps['surname'] . ' ' .$inps['othernames']. ' to the counseling department.');
        return redirect()->back();
 		
 	}

	public function edit()
	{
        // $id = \Crypt::decrypt($inps['tagno']);
		$inps = Input::all();
        $counselor = \App\Counselor::find($inps['counselorid']);
        $counselor->tag_no = $inps['tagno'];
        $counselor->surname = $inps['surname'];
        $counselor->othernames = $inps['othernames'];
        $counselor->dob = $inps['dob'];
        $counselor->email = $inps['emailaddress'];
        $counselor->phone1 = $inps['phone1'];
        $counselor->phone2 = $inps['phone2'];
        $counselor->resaddress = $inps['resaddress'];
        $counselor->state_id = $inps['state'];
        $counselor->lga_id = $inps['lga'];
        $counselor->home_town = $inps['hometown'];
        $counselor->zone_id = 1;
        $counselor->location_id = \Auth::user()->location_id;
        $counselor->date_enlisted = $inps['dateenlisted'];
        $counselor->date_confirmed = $inps['dateconfirmed'];
        $counselor->biography = $inps['biography'];
        $counselor->created_by = \Auth::user()->id;
        $counselor->status = 1;
        // dd($counselor);
        $counselor->save();
        flash()->success('You have successfully edited '. $inps['surname'] . ' ' .$inps['othernames']. ' \'s information on the system.');
        return redirect()->back();
	}

	public function assignbatch()
	{
		$inps = Input::all();
        $batch = \App\FoundationClass::find($inps['class']);
        $batch->counselor_id = $inps['counselorid'];
        $batch->update();
		
		$msg = "Congrats!. You have been assigned to take ".$batch->name." of the Foundation Class. Your engagement starts from ". $batch->start_date." and ends on ". $batch->end_date." Pls contact the office for your attendance sheet. Thank U. HOD";
    	$recipient = "08165420728,".$inps['counselorphone'];
		$sms_url = 'https://netbulksms.com/index.php?option=com_spc&comm=spc_api&username=GESUMAYOR&password=nanoplus85&sender=DunamisHQ&recipient=' . $recipient . '&message=' . urlencode($msg);
		$sms = file_get_contents($sms_url);

        flash()->success('You have successfully assign class ' .$batch->name. ' to this counselor. Thank you.');
        return redirect()->back();

	}

	 public function uploadImage()
    {
       
        $inputs = Input::all();
        $file = Input::file('image');
       if ($file !== "") {
             $img = $inputs['image'];
                $folderPath = base_path().'/public/images/counselors/'; // Destination Path
                $image_parts = explode(";base64,", $img);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = $inputs['counselorid']. '.png';
                $file = $folderPath . $fileName;
                file_put_contents($file, $image_base64);
               }
               flash()->success('You have successfully uploaded counselor\s image to the system');
        return redirect()->route('counselors.one', \Crypt::encrypt($inputs['counselorid']));
    }

    public function delete()
    {
    	$inps = Input::all();
        $counselor = \App\Counselor::find($inps['counselorid']);
        $counselor->delete();
        SystemLog('Counselors', 'Counselors', \Auth::user()->first_name. ' '.\Auth::user()->last_name. ' Deleted '.$counselor->surname. ' records from the Counselors information', $_SERVER['REMOTE_ADDR']);
        flash()->success('You have successfully Deleted ' .$counselor->surname. ' from the counselors list . Thank you.');
        return redirect()->route('counselors.index', \Crypt::encrypt(323423));
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
        SystemLog('System User', 'New User Data', \Auth::user()->surname. ' added '.$nU->surname."'s data to the system", $_SERVER['REMOTE_ADDR']);
       
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
