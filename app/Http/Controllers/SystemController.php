<?php

/*
Project: Dunamis eMembers/Information Management Software - Dunamis International Gospel Center, Abuja.
File Name: System Controller 
Description: Core System functionalities and settings controller.
Author: Umoru Godfrey, E. 
Address: GESU-Soft Technology, Abuja Nigeria
godfrey@gesu.com
Date Created: 16th October, 2018.
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
// use \App\Mail\ActivationMail;
use \App\Mail\SampleMail;

class SystemController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function preference()
    {
    	# code...
    }

    public function settings()
    {
        # code...
    }

    public function editSetting()
    {
        # code...
    }

    public function users()
    {
        $param['users'] = \App\User::all(); // select * from users
    	$param['user'] = \App\User::where('status', '!=', 1)->get(); // select * from users where status != 1
        $param['roles'] = \App\Role::all();
        $param['rolex'] = \App\Role::where('id', '!=', 0)->get();
        $param['permissions'] = \App\Permission::all();
        $param['pageName'] = "System Users";
        SystemLog('System Users', 'User Data', \Auth::user()->first_name. ' viewed all system users', $_SERVER['REMOTE_ADDR']);
        return view('systems.users.index', $param);
    }
    public function allusers()
    {
        $param['users'] = \App\User::all(); // select * from users
    	$param['user'] = \App\User::where('status', '!=', 1)->get(); // select * from users where status != 1
        $param['roles'] = \App\Role::all();
        $param['rolex'] = \App\Role::where('id', '!=', 0)->get();
        $param['permissions'] = \App\Permission::all();
        $param['pageName'] = "System Users";
        SystemLog('System Users', 'User Data', \Auth::user()->first_name. ' viewed all system users', $_SERVER['REMOTE_ADDR']);
        return view('systems.users.all', $param);
    }

    public function viewOne($id)
    {
        $id = \Crypt::decrypt($id);
        $param['user'] = \App\User::find($id);
        $param['roles'] = \App\Role::all();
        $param['rolex'] = \App\Role::all();
        $param['permissions'] = \App\Permission::all();
        $param['pageName'] = $param['user']->first_name. "'s Profile";
        SystemLog('System User', 'User Data', \Auth::user()->first_name. ' viewed '.$param['user']->first_name.' '. $param['user']->last_name."'s user data", '','', $_SERVER['REMOTE_ADDR']);

        return view('systems.users.profile', $param);
    }

    public function newUser()
    {
        $data = Input::all();
        
        $userExists = \App\User::whereEmail(Input::get('email'))->exists();
        if ($userExists) {
               flash()->warning('This email '.$data['email'].' already exists for a user in the database');
               return back();
        } else {
        $nU = new \App\User;
        // dd($data);
        $nU->first_name = $data['sname'];
        $nU->last_name = $data['onames'];
        $nU->username = $data['sname'];
        $nU->email = $data['email'];
        $nU->phone_no = $data['phoneno'];
        // $nU->location_id = \Auth::user()->location_id;
        if(\Auth::user()->location_id ==1){
            $nU->location_id = $data['location'];
        }else{
            $nU->location_id = $data['locationx'];
        }
        

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
        $nU->syncRoles($data['role_id']);
        $password = implode($pass);
        
        $user = \App\User::find($nU->id);
        $optCode = $user->otp_key;
        $names = $data['sname']. ' '.$data['onames'];
        \Mail::to($data['email'])->send(new SampleMail($data['email'],$password, $optCode, $names));
        SystemLog('System User', 'New User Data', \Auth::user()->first_name. ' added '.$nU->surname."'s data to the system", $_SERVER['REMOTE_ADDR']);
       
        // $uname = "GESUMAYOR";
        // $pwd = "nanoplus85";
        // $msg = "You have been enrolled on the Church A-2-Z platform of Dunamis International Gospel Center. Check your email: " . $data['email']. " to get your login details, one time password (OTP Code) and other details. if not found in the inbox, please check the spam folder in your email. It is valid for 48 hours. Make sure you login and update your account. Thank you";
        // // $msg = "Congrat! Your user account has been setup on the Dunamis Information eMembers Management System. Your credentials are as follows: Username: " .$data['email']. " Password: ".$pass." Your OneTimePassword to activate this account is ". $optCode." Thank You.";
        // $sender = "DunamisHQ";
        // $recipient = $data['phoneno'];
        // $sms = file_get_contents($sms_url);
        
    // 	$recipient = $data['phoneno'];
// 		$sms_url = 'https://netbulksms.com/index.php?option=com_spc&comm=spc_api&username=naanpan&password=mylord1978&sender=DunamisHQ&recipient=' . $recipient . '&message=' . urlencode($msg);
        flash()->success('Account details and One Time Code successfully sent via mail, let the user chech his/her email'); 
        return back();
        }
    }

    public function resendCode()
    {
        $r = mt_rand(4, 9049);
        $code = mt_rand(6, 654321);
        $user = \App\User::find(\Auth::user()->id);
        $sendto = $user->phone; //Getting authenticated user's phone
        $user->otp_key = $code;
        $user->update();
        $email = $user->email;
        $optCode = $user->otp_key;
        $email = $user->email;
        $names = $user->first_name.' '.$user->last_name;
        \Mail::to($email)->send(new ResendCodeMail($names, $optCode));
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
        $user = \App\User::find($data['userid']);
        // dd($user);
        $sendto = $user->phone; //Getting authenticated user's phone
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
        \Mail::to($data['email'])->send(new SampleMail($email,$password, $otpCode, $names));
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
        $user = \App\User::find(\Auth::user()->id); //check the user in question
        if($data['code'] !== '')  { //check if code input is not empty
            // return redirect()->back()->with('alert', 'No data provided');
                if ($user->otp_key == $data['code']) { //if code is not empty and it matches the users optCode
                    $user->status = 1; //Set user Verify status to true
                    $user->isVerify = 1; //Verify the user
                    $user->update(); //Update the verification status
                 return redirect('/system/user/myaccount/update_password/'.\Crypt::encrypt(\Auth::user()->id));   //send him/her to the desired page
                }
        elseif($user->otp_key !== $data['code']){ //check if his code entered is correct
            return redirect()->back()->with('error', $data['code']); // if not correct code inform the user with the wrong code entered.
            }
             //End check
        SystemLog('auth', 'User Verified', \Auth::user()->first_name .'has verified account on the system', $code, $_SERVER['REMOTE_ADDR']);
        return redirect('/user/verify');  
        }
    }

    public function addRole()
    {   
        $data = Input::all();
        $user = \App\User::find($data['user_id']);
        $user->syncRoles($data['role_id']);
        // SystemLog('System Roles', 'ACL', \Auth::user()->surname. ' viewed '.$param['user']->surname."'s user data", $_SERVER['REMOTE_ADDR']);
        return redirect()->back();
    }

    public function revokeRole()
    {   
        $data = Input::all();
        $user = \App\User::find($data['user_id']);
        $user->revokeRole($data['role_id']);
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
        $usr = \App\User::find(\Auth::user()->id);
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

    public function uploadImage()
    {
       
        $inputs = Input::all();
        $file = Input::file('image');
       if ($file !== "") {
             $img = $inputs['image'];
                $folderPath = base_path().'/public/images/users/'; // Destination Path
                $image_parts = explode(";base64,", $img);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = $inputs['userid']. '.png';
                $file = $folderPath . $fileName;
                file_put_contents($file, $image_base64);
               }
               flash()->success('You have successfully uploaded users image to the system');
        return redirect()->route('user.profile', \Crypt::encrypt($inputs['userid']));
    }


    public function editUser($id)
    {
    	$data = Input::all();
        $eU = \App\User::find($data['userid']);
        dd($data);
        $eU->surname = $data['sname'];
        $eU->othernames = $data['onames'];
        $eU->username = $data['email'];
        $eU->email = $data['email'];
        $eU->phone_no = $data['phoneno'];
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
        $param['roles'] = \App\Role::all();
    	$param['rolex'] = \App\Role::all();
        $param['permissions'] = \App\Permission::all();
        $param['pageName'] = "System Roles";


        return view('systems.acl.roles.index', $param);
    }

    public function viewOneR($id)
    {
        $id = \Crypt::decrypt($id);
        $param['role'] = \App\Role::find($id);
        $param['pageName'] = $param['role']->name ."'s Profile" ;
        $param['permissions'] = \App\Permission::all();
        return view('systems.acl.roles.profile', $param);
    }

    public function newRole()
    {
        $data = Input::all();
        $rl = new \App\Role;
        $rl->name = $data['name'];
        $rl->slug = $data['slug'];
        $rl->description = $data['description'];
        $rl->save();
        return redirect()->back();
    }

    public function editRole()
    {
        $data = Input::all();
        $rl = \App\Role::find($data['roleId']);
        $rl->name = $data['name'];
        $rl->slug = $data['slug'];
        $rl->description = $data['description'];
        $rl->save();
        return redirect()->back();
    }

    public function disableRole()
    {
        # code...
    }


    public function tickets()
    {

        $param['tickets'] = \App\Ticket::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $param['pageName'] = "System Tickets";
        return view('systems.tickets.index', $param);

    }
   
    public function newticket()
    {
        $param['nCats'] = \App\TicketCategory::all();
        return view('systems.tickets.new', $param);
    }

    public function oneTicket($id)
    {
        $id = \Crypt::decrypt($id);
        $param['ticket'] = \App\Ticket::find($id);
        $param['status'] = \App\TicketStatus::where('id', '>=', '1')->where('id', '<=', '5')->get();
        $param['user'] = \App\User::where('type', 2)->get();
        $param['stakeholders'] = \App\StakeHolder::all();
        $param['pageName'] = $param['ticket']->title. "'s Profile";
        return view('systems.tickets.oneTicket', $param);
    }
    public function createticket()
    {
        //Create New Ticket     
        $td = Input::all();
        // dd($td);
        
        $nT = new \App\Ticket;
        $nT->serial = mt_rand(1234987, 987745124);
        $nT->title = $td['title'];
        $nT->category_id = $td['category'];
        $nT->priority = $td['priority'];
        $nT->user_id = \Auth::user()->id;
        $nT->dated = \Carbon\Carbon::parse($td['doi']);
        $nT->description = $td['description'];
        $nT->status = 1;
        $nT->save();

        $tckPrss = new \App\TicketProcessed;
        $tckPrss->ticket_id = $nT->id;
        $tckPrss->user_id = \Auth::user()->id;
        $tckPrss->action = "Opened Ticket";
        $tckPrss->ticket_status_id = 1;
        $tckPrss->process_note = "New ticket generated";
        $tckPrss->save();
        return redirect('/home');
    }

    public function assignTicket()
    {
        $tk = Input::all();
        $tck = \App\Ticket::find($tk['ticketID']);
        $tck->status = 2;
        $tck->assigned_to = $tk['user'];
        $tck->assigned_by = \Auth::user()->id;
        $tck->expected_delivery = $tk['days'];
        $tck->assignment_note = $tk['assignement_note'];
        $tck->date_assigned = \Carbon\Carbon::now();
        $tck->update();

        $tckPrss = new \App\TicketProcessed;
        $tckPrss->ticket_id = $tk['ticketID'];
        $tckPrss->user_id = \Auth::user()->id;
        $tckPrss->action = "Assigned Ticket";
        $tckPrss->ticket_status_id = 2;
        $tckPrss->process_note = $tk['process_note'];
        $tckPrss->save();

        return redirect('/system/tickets/view/' .$tk['ticketID']);
    }

    public function processTicket()
    {
        $tk = Input::all();
        $tckPrss = new \App\TicketProcessed;
        $tckPrss->ticket_id = $tk['ticketID'];
        $tckPrss->user_id = \Auth::user()->id;
        $tckPrss->action = "Assigned Ticket";
        $tckPrss->ticket_status_id = $tk['status'];
        $tckPrss->process_note = $tk['process_note'];
        $tckPrss->save();

        $tck = \App\Ticket::find($tk['ticketID']);
        $tck->status = $tk['status'];
        $tck->update();
        
     return redirect()->back();
    }

    public function closeTicket()
    {
        $tk = Input::all();

        $tck  = \App\Ticket::find($tk['ticketID']);
        $tck->status = 4;
        $tck->update();

        $tckPrss = new \App\TicketProcessed;
        $tckPrss->ticket_id = $tk['ticketID'];
        $tckPrss->user_id = \Auth::user()->id;
        $tckPrss->action = "Closed Ticket";
        $tckPrss->ticket_status_id = $tk['status'];
        $tckPrss->process_note = $tk['process_note'];
        $tckPrss->save();

        return redirect()->back();


    }

    public function cancelticket()
    {

    }

    public function editTicket()
    {
        $post = Input::all();
        // dd($post);
        $tck = \App\Ticket::find($post['ticket_id']);
        $tck->description = $post['description'];
        $tck->save();
        return redirect('/tickets/view/' .$post['ticketID']);
        
    }

    public function newTicketStakeholder()
    {
        $tskh = Input::all();

        // dd($tskh);
        $tkSthD = new \App\TicketStakeHolder;
        $tkSthD->ticket_id = $tskh['ticketID'];
        $tkSthD->stake_holder_id = $tskh['stakeholder'];
        $tkSthD->save();
        return redirect()->back()->with('message', 'Stakeholder successfully added to this ticket');

    }

    public function addStakeHolder()
    {

        $tkD = Input::all();
        $tkSk = new \App\TicketStakeHolder;
        $tkSk->surname = $tkD['surname'];
        $tkSk->other_names = $tkD['other_name'];
        $tkSk->email = $tkD['email'];
        $tkSk->phone_no = $tkD['phone'];
        $tkSk->reason_for_addition = $tkD['reason_for_addition'];
        $tkSk->save();
        return redirect()->back();
    }


    // System Preferences
    public function systemPreference()
    {
        $param['preference'] = \App\SystemPreference::all();
        $param['pageName'] = "System Preference" ;
        return view('systems.preferences.index', $param);
    }

    
    public function logs()
    {
        $param['logs'] = \App\ActivityLog::where('user_id', '!=', '')->orderBy('created_at', 'desc')->get();
        // "select * from `activity_logs` where `user_id` != '' orderBy `created_at` asc, LIMIT 1000"
        $param['pageName'] = "System Activity Logs";

        return view('systems.acl.logs.auditlogs', $param);
    }

}
