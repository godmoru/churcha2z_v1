<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;


class SystemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function users()
    {
        $param['users'] = User::all(); // select * from users
    	$param['user'] = User::where('status', '!=', 1)->get(); // select * from users where status != 1
        $param['roles'] = Role::all();
        $param['rolex'] = Role::where('id', '!=', 0)->get();
        $param['permissions'] = Permission::all();
        $param['pageName'] = "System Users";
        // SystemLog('System Users', 'User Data', \Auth::user()->first_name. ' viewed all system users', $_SERVER['REMOTE_ADDR']);
        return view('systems.users.index', $param);
    }
    
    public function allusers()
    {
        $param['users'] = User::all(); // select * from users
    	$param['user'] = User::where('status', '!=', 1)->get(); // select * from users where status != 1
        $param['roles'] = Role::all();
        $param['rolex'] = Role::where('id', '!=', 0)->get();
        $param['permissions'] = Permission::all();
        $param['pageName'] = "System Users";
        // SystemLog('System Users', 'User Data', \Auth::user()->first_name. ' viewed all system users', $_SERVER['REMOTE_ADDR']);
        return view('systems.users.all', $param);
    }

    public function viewOne($id)
    {
        $id = \Crypt::decrypt($id);
        $param['user'] = User::find($id);
        $param['roles'] = Role::all();
        $param['rolex'] = Role::all();
        $param['permissions'] = Permission::all();
        $param['pageName'] = $param['user']->first_name. "'s Profile";
        // SystemLog('System User', 'User Data', \Auth::user()->first_name. ' viewed '.$param['user']->first_name.' '. $param['user']->last_name."'s user data", '','', $_SERVER['REMOTE_ADDR']);

        return view('systems.users.profile', $param);
    }

    public function newUser(Request $request)
    {
        
        $userExists = User::whereEmail(Input::get('email'))->exists();
        if ($userExists) {
               flash()->warning('This email '.$request->email.' already exists for a user in the database');
               return back();
        } else {
        $nU = new \App\Models\User;
        // dd($data);
        $nU->first_name = $request->sname;
        $nU->last_name = $request->onames;
        $nU->username = $request->sname;
        $nU->email = $request->email;
        $nU->phone_no = $request->phoneno;
        // $nU->location_id = \Auth::user()->location_id;

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
        $nU->type = 2;
        $nU->status = 2;
      
        $nU->save();
        $nU->syncRoles($request->role_id);
        $password = implode($pass);
        
        $user = User::find($nU->id);
        $optCode = $user->otp_key;
        $names = $request->sname. ' '.$request->onames;
        // \Mail::to($request->email)->send(new SampleMail($request->email,$password, $optCode, $names));
        // SystemLog('System User', 'New User Data', \Auth::user()->first_name. ' added '.$nU->surname."'s data to the system", $_SERVER['REMOTE_ADDR']);
       
        // $uname = "GESUMAYOR";
        // $pwd = "nanoplus85";
        // $msg = "You have been enrolled on the Church A-2-Z platform of Dunamis International Gospel Center. Check your email: " . $request->email']. " to get your login details, one time password (OTP Code) and other details. if not found in the inbox, please check the spam folder in your email. It is valid for 48 hours. Make sure you login and update your account. Thank you";
        // // $msg = "Congrat! Your user account has been setup on the Dunamis Information eMembers Management System. Your credentials are as follows: Username: " .$request->email']. " Password: ".$pass." Your OneTimePassword to activate this account is ". $optCode." Thank You.";
        // $sender = "DunamisHQ";
        // $recipient = $request->phoneno;
        // $sms = file_get_contents($sms_url);
        
    // 	$recipient = $request->phoneno;
// 		$sms_url = 'https://netbulksms.com/index.php?option=com_spc&comm=spc_api&username=naanpan&password=mylord1978&sender=DunamisHQ&recipient=' . $recipient . '&message=' . urlencode($msg);
        flash()->success('Account details and One Time Code successfully sent via mail, let the user chech his/her email'); 
        return back();
        }
    }

    public function resendCode()
    {
        $r = mt_rand(4, 9049);
        $code = mt_rand(6, 654321);
        $user = User::find(\Auth::user()->id);
        $sendto = $user->phone; //Getting authenticated user's phone
        $user->otp_key = $code;
        $user->update();
        $email = $user->email;
        $optCode = $user->otp_key;
        $email = $user->email;
        $names = $user->first_name.' '.$user->last_name;
        // \Mail::to($email)->send(new ResendCodeMail($names, $optCode));
        flash()->success('We have just sent your code new One Time Code to you via mail, check your email'); 
        return back();
    }
    
    
    public function resendAccountDetails()
    {

        $data = Input::all();


        $r = mt_rand(4, 9049);
        //Generatinga random password for the user
            $alphabet = "1234567890abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789@!"; //
            $pass = array(); // $pass as an array
            $alphaLength = strlen($alphabet) - 1; //the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
            }

        $code = mt_rand(6, 654321);
        $user = User::find($request->userid']);
        // dd($user);
        // $sendto = $user->phone; //Getting authenticated user's phone
        $user->otp_key = $code;
        $user->password = bcrypt(implode($pass));
        $user->isVerify = 2;
        $user->type = 2;
        $user->status = 2;
        $user->update();
        $email = $user->email;
        $optCode = $user->otp_key;
        $email = $user->email;
        $password = implode($pass);
        $otpCode = $user->otp_key;
        $names = $user->first_name.' '.$user->last_name;
        // \Mail::to($request->email'])->send(new SampleMail($email,$password, $otpCode, $names));
        flash()->success('Account details and One Time Code successfully sent via mail, let the user chech his/her email'); 
        return back();
    }
    

  public function verify()
    {

        $param['pageName'] = "User Verification";
        $param['msg'] = "R";
        return view('auth.verify', $param);
    }

    public function verifyUser()
    {
        $data = Input::all();
        $user = User::find(\Auth::user()->id); //check the user in question
        if($request->code !== '')  { //check if code input is not empty
            // return redirect()->back()->with('alert', 'No data provided');
                if ($user->otp_key == $request->code) { //if code is not empty and it matches the users optCode
                    $user->status = 1; //Set user Verify status to true
                    $user->isVerify = 1; //Verify the user
                    $user->update(); //Update the verification status
                 return redirect('/system/user/myaccount/update_password/'.\Crypt::encrypt(\Auth::user()->id));   //send him/her to the desired page
                }
        elseif($user->otp_key !== $request->code){ //check if his code entered is correct
            return redirect()->back()->with('error', $request->code); // if not correct code inform the user with the wrong code entered.
            }
             //End check
        // SystemLog('auth', 'User Verified', \Auth::user()->first_name .'has verified account on the system', $code, $_SERVER['REMOTE_ADDR']);
        return redirect('/user/verify');  
        }
    }

    public function addRole()
    {   
        $data = Input::all();
        $user = User::find($request->user_id);
        $user->syncRoles($request->role_id);
        // SystemLog('System Roles', 'ACL', \Auth::user()->surname. ' viewed '.$param['user']->surname."'s user data", $_SERVER['REMOTE_ADDR']);
        return redirect()->back();
    }

    public function revokeRole()
    {   
        $data = Input::all();
        $user = User::find($request->user_id);
        $user->revokeRole($request->role_id);
        return redirect()->back();
    }


    public function updatePassword()
    {
        $param['pageName'] = "Update Password";

        return view('systems.users.changepassword', $param);
    }

    public function doUpdatePassword()
    {
        $up = Input::all();
        // dd($up);
        $usr = User::find(\Auth::user()->id);
        if($up['new_password'] !== '')  { 
                if ($up['new_password'] == $up['password_confirmation']) { //if code is not empty and it matches the users optCode
                    $usr->password = bcrypt($up['new_password']); //Set user Verify status to true
                    $usr->update(); //Update the verification status
                    \Auth::logout(); //log him/her out of the system so he/she can login properlly with the new password set
                    \Session::flush(); //Flush his/her session from the session manager.
                 return redirect('/'); //return him/her to the startup page   
                }
        elseif($up['new_password'] !== $up['password_confirmation']){ //check if his password entered matched each other
            return redirect()->back()->with('error', $up['new_password'],$up['password_confirmation']); // if the two passwords do not match each other
            }
             //End check
        return redirect()->back();  
        }
    }

    public function uploadImage(Request $request)
    {
       
        $file = $request->image;
       if ($file !== "") {
             $img = $request->image;
                $folderPath = base_path().'/public/images/users/'; // Destination Path
                $image_parts = explode(";base64,", $img);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = $request->userid. '.png';
                $file = $folderPath . $fileName;
                file_put_contents($file, $image_base64);
               }
               flash()->success('You have successfully uploaded users image to the system');
        return redirect()->route('user.profile', \Crypt::encrypt($request->userid));
    }


    public function editUser($id)
    {
    	$data = Input::all();
        $eU = User::find($request->userid);
        // dd($data);
        $eU->surname = $request->sname;
        $eU->othernames = $request->onames;
        $eU->username = $request->email;
        $eU->email = $request->email;
        $eU->phone_no = $request->phoneno;
        $eU->save();
        return redirect()->back();
    }

    public function disableUser($id)
    {
    	# code...
    }

    public function addUserRole($id)
    {
        # code...
    }

    public function removeUserRole($id)
    {
        # code...
    }

    public function destroyuser(Request $request)
    {
        $this->validate($request, [
            'selected' => 'required',
        ]);
        $selected = $request->input('selected');
            \DB::table('users')->whereIn('id', $selected)->delete();
            flash()->warning('You have successfully deleted users record from the system');
        return redirect()->back();
    }



    public function roles()
    {
        $param['roles'] = \App\Models\Role::all();
    	$param['rolex'] = \App\Models\Role::all();
        $param['permissions'] = Permission::all();
        $param['pageName'] = "System Roles";


        return view('systems.acl.roles.index', $param);
    }

    public function viewOneR($id)
    {
        $id = \Crypt::decrypt($id);
        $param['role'] = Role::find($id);
        $param['pageName'] = $param['role']->name ."'s Profile" ;
        $param['permissions'] = Permission::all();
        return view('systems.acl.roles.profile', $param);
    }

    public function newRole(Request $request)
    {
        $rl = new Role;
        $rl->name = $request->name;
        $rl->slug = $request->slug;
        $rl->description = $request->description;
        $rl->save();
        return redirect()->back();
    }

    public function editRole(Request $request)
    {
        $rl = Role::find($request->roleId);
        $rl->name = $request->name;
        $rl->slug = $request->slug;
        $rl->description = $request->description;
        $rl->save();
        return redirect()->back();
    }

    public function disableRole()
    {
        # code...
    }
}
