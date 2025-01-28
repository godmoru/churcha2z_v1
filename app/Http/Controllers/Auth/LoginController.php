<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Check user's role and redirect user based on their role
     * @return 
     */
    public function authenticated()
    {
        $user = \Auth::user();
        SystemLog('Authentication', 'User Logged In', \Auth::user()->first_name. ' '.\Auth::user()->first_name." logged on to the system", $_SERVER['REMOTE_ADDR']);

        // \Auth::logoutOtherDevices(request('password')); 
            $match = false;

        foreach($user->getRoles() as $role){
            // dd($role);
            switch($role){
                case "administrator": 
                    if ($user->isVerify == 2) {
                        return redirect('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
                    } else {
                        return redirect('/home/'.\Crypt::encrypt(\Auth::user()->id));             
                    }
                    break;

                case "counselor-hod": 
                    if ($user->isVerify == 2) {
                        return redirect('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
                    } else {
                        return redirect('/home/'.\Crypt::encrypt(\Auth::user()->id));             
                    }
                    break;
                
                case "fc-coordinator": 
                    if ($user->isVerify == 2) {
                        return redirect('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
                    } else {
                        return redirect('/home/'.\Crypt::encrypt(\Auth::user()->id));                
                    } 
                    
                    break;

                case "counters-hod": 
                    if ($user->isVerify == 2) {
                        return redirect('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
                    } else {
                        return redirect('/locations/view-attendance-data/'.\Crypt::encrypt(\Auth::user()->id));               
                    }
                    break;
                
                case "counter-desk-officer": 
                    if ($user->isVerify == 2) {
                        return redirect('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
                    } else {
                        return redirect('/locations/view-attendance-data/'.\Crypt::encrypt(\Auth::user()->id));               
                    }
                    break;
                    
                case "resident-pastor": 
                    if ($user->isVerify == 2) {
                        return redirect('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
                    } else {
                        return redirect('/locations/submit-weekly-reports/'.\Crypt::encrypt(\Auth::user()->id));               
                    }
                    break;
                
                case "front-desk": 
                    if ($user->isVerify == 2) {
                        return redirect('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
                    } else {
                        return redirect('/converts/add-new/'.\Crypt::encrypt(\Auth::user()->id));               
                    }
                    break;
                
                case "fd-supervisor": 
                    if ($user->isVerify == 2) {
                        return redirect('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
                    } else {
                        return redirect('/converts/index/'.\Crypt::encrypt(\Auth::user()->id));              
                    }
                    break;
                    
                case "hc-front-desk":
                    if ($user->isVerify == 2) {
                        return redirect('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
                    } else {
                        return redirect('/home-church/districts/'.\Crypt::encrypt(\Auth::user()->id));               
                    }
                    break;
                    
                case "hc-office": 
                    if ($user->isVerify == 2) {
                        return redirect('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
                    } else {
                        return redirect('/home-church/districts/'.\Crypt::encrypt(\Auth::user()->id));              
                    }
                    break;

                    case "auditor": 
                    if ($user->isVerify == 2) {
                        return redirect('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
                    } else {
                        return redirect('/accounts/dashboards/'.\Crypt::encrypt(\Auth::user()->id));              
                    }
                    break;
                    
                    case "hq-accountant": 
                    if ($user->isVerify == 2) {
                        return redirect('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
                    } else {
                        return redirect('/accounts/dashboards/'.\Crypt::encrypt(\Auth::user()->id));              
                    }
                    break;
                    
                    case "account-officer": 
                    if ($user->isVerify == 2) {
                        return redirect('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
                    } else {
                        return redirect('/accounts/location-income/'.\Crypt::encrypt(\Auth::user()->id));              
                    }
                    break;
                    
                    case "mobile-church": 
                    if ($user->isVerify == 2) {
                        return redirect('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
                    } else {
                        return redirect('/converts/index/'.\Crypt::encrypt(\Auth::user()->id));              
                    }
                    break;
                    
                    case "hq-minister": 
                    if ($user->isVerify == 2) {
                        return redirect('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
                    } else {
                        
                        return redirect('/hr/pastors/one/'.\Crypt::encrypt(\Auth::user()->pastorData->id));              
                    }
                    break;
                    
                    case "location_admin": 
                    if ($user->isVerify == 2) {
                        return redirect('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
                    } else {
                        return redirect('/home/'.\Crypt::encrypt(\Auth::user()->id));              
                    }
                    break;
                    
                    case "assistant-pastor": 
                    if ($user->isVerify == 2) {
                        return redirect('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
                    } else {
                        
                        return redirect('/hr/pastors/one/'.\Crypt::encrypt(\Auth::user()->pastorData->id));              
                    }
                    break;
                    

            }
        }
    }


}
