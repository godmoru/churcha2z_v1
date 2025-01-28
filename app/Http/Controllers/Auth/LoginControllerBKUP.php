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
        // \Auth::logoutOtherDevices(request('password')); 
            if(auth()->user()->hasRole('administrator'))
            {
            return redirect('/home');
            } 

            if ($user->getRoles('counselor-hod')) {
                return redirect('/home/'.\Crypt::encrypt(\Auth::user()->id));
                // return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
            }
            if ($user->getRoles('fc-coordinator')) {
                return redirect('/home/'.\Crypt::encrypt(\Auth::user()->id));
                // return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
            }

            if($user->getRoles('counter-hod')) {
                  return redirect('/locations/view-attendance-data/'.\Crypt::encrypt(\Auth::user()->id));
                // return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
            }

            if($user->getRoles('counter-desk-officer')) {
                return redirect('/locations/view-attendance-data/'.\Crypt::encrypt(\Auth::user()->id));
                // return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
            }


            if ($user->getRoles('resident-pastor')) {
                return redirect('home/'.\Crypt::encrypt(\Auth::user()->id));
                // return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
            }
            // else{
            //             return redirect()->route('home');
            //     }


        // $user = \Auth::user();
        // \Auth::logoutOtherDevices(request('password')); 
        // if(auth()->user()->hasRole('administrator') && \Auth::user()->status == 2)
        // {
        //     return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
        //     } 
        //     if(auth()->user()->hasRole('counselor-hod') && \Auth::user()->status == 2)
        //     {
        //     return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
        //     }
        //     else
        //         {
        //         return redirect('/foundation-classes-batches/'.\Crypt::encrypt(\Auth::user()->id));
        //     }
            
        //     if(auth()->user()->hasRole('front-desk') && \Auth::user()->status == 2)
        //     {
        //     return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
        //     }
        //     else
        //         {
        //         return redirect('/converts/add-new/'.\Crypt::encrypt(\Auth::user()->id));
        //     }
            
        //     if(auth()->user()->hasRole('fc-coordinator') && \Auth::user()->status == 2)
        //     {
        //     return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
        //     }
        //     else
        //         {
        //         return redirect('/foundation-classes-batches/'.\Crypt::encrypt(\Auth::user()->id));
        //     }
            
    
        //     if(auth()->user()->hasRole('counter-hod') && \Auth::user()->status == 2)
        //     {
        //         dd("We are here");
        //     return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
        //     }
        //     else
        //         {
        //         return redirect('/locations/view-attendance-data/'.\Crypt::encrypt(\Auth::user()->id));
        //     }
            
        //     if(auth()->user()->hasRole('counter-desk-officer') && \Auth::user()->status == 2)
        //     {
        //     return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
        //     }
        //     else
        //         {
        //         return redirect('/locations/view-attendance-data/'.\Crypt::encrypt(\Auth::user()->id));
        //     }
            
            // if ($user->getRoles('counselor') && \Auth::user()->status == 2) {
            //     return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
            // }
            //         else{
            //             return redirect()->route('home');
            //     }


        // if (isset($user->personnelData)) {
        //     $person_ = $user->personnelData;
        // }
        // if(!$user->getRoles('maintenance-admin')){
        //     return redirect()->intended('/system/preference/'.\Crypt::encrypt(232242));
        // }
        // elseif($user->getRoles('administrator')){
        //     return redirect()->intended('/home');
        // }
        
        // else{
        //     return redirect('/home');
        // }

        //     if( \Auth::user()->roles[0]['name'] == 'role-x' || \Auth::user()->roles[0]['name'] == 'role-y' ) return Redirect()->route('role-xy.index');

        //     if( \Auth::user()->roles[0]['name'] == 'role-z' ) return Redirect()->route('rolo-z.index');

        //     if( \Auth::user()->roles[0]['name'] == 'administrator' ) return Redirect()->route('admin.index');


            //Checking for Administrator's role and redirect to the appropriate page
        // if(!$user->status == 1 && \Auth::user()->getRoles('administrator')){
        //         return redirect()->intended('/home');
        //     }

        //     //Checking for HR Admin's role and redirect to the appropriate page
        //     elseif($user->status == 1 && \Auth::user()->getRoles('hr-admin')){
        //         return redirect()->intended('/home');
        //     }

        //     //Checking for maintenance Admin's role and redirect to the appropriate page
        //     elseif($user->status == 1 && \Auth::user()->getRoles('maintenance-admin')){
        //         return redirect()->intended('/system/preference/'.\Crypt::encrypt(5));
        //     }

        //     // To do new account verification only
        // elseif($user->status==2 && \Auth::user()->getRoles('administrator')){
        //     return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
        // }
        //     // To do verification of personnel only
        // elseif($user->status==2 && \Auth::user()->getRoles('hr-admin')){
        //     return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
        // }
        // elseif($user->status==2 && \Auth::user()->getRoles('employee')){
        //     return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
        // }

        // //Normal Employee Login
        // elseif($user->status == 1 && \Auth::user()->getRoles('employee')){
        //         return redirect()->intended('/pim/employees/data/'.\Crypt::encrypt(Auth::user()->id));
        //     }
        // //If not seen then return to login page!
        // else{
        //     return redirect()->intended($this->redirectPath());
        // }

        // if (!$user->getRoles('administrator')){
        //         return redirect()->intended('/home');
        //     }
        //     // elseif ($user->getRoles('administrator') && $user->status == 2) {
        //     //     return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
        //     // }

        //     elseif ($user->getRoles('counselor') && $user->status == 2) {
        //         return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
        //     }
        //     elseif ($user->getRoles('counter')) {
        //         return "We made it as counters"; exit();
        //         return redirect()->intended('/pim/employees/data/'.\Crypt::encrypt($person_->id));
        //     }
        //     elseif ($user->getRoles('resident-pastor') && $user->status == 2) {
        //         return redirect()->intended('/system/user/account/verification/'.\Crypt::encrypt(\Auth::user()->id));
        //     }
        //     elseif ($user->getRoles('counselor-head')) {
        //         return redirect()->intended('/home');
        //     }

           

    }


}
