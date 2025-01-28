<?php

/*
Project: Membership/Information Management Software - Dunamis International Gospel Center, Abuja
File Name: Home Controller 
Description: Core dashboard & reporting functionalities controller.
Author: Umoru Godfrey, E. 
Address: GESUSOFT Technology, Abuja Nigeria
godfrey.umoru@gesusoft.com
Date Created: 16th September, 2018.
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $param['pageName'] = "Integrated Dashboard";
        // $param['newconverts'] = \App\People::where('people_category_id',1)->where('fclass_status',2)->where('location_id', \Auth::user()->location_id)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        // $param['firsttimers'] = \App\People::where('people_category_id',2)->where('fclass_status',2)->where('location_id', \Auth::user()->location_id)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['newconverts'] = \App\People::where('people_category_id',1)->where('fclass_status',2)->where('location_id', \Auth::user()->location_id)->get();
        $param['firsttimers'] = \App\People::where('people_category_id',2)->where('fclass_status',2)->where('location_id', \Auth::user()->location_id)->get();
        $param['fclassPeople'] = \App\People::where('fclass_status',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->where('location_id', \Auth::user()->location_id)->get();
        $param['dltcPeople'] = \App\People::where('dltc_status',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->where('location_id', \Auth::user()->location_id)->get();
        
        $param['districts'] = \App\District::where('location_id', \Auth::user()->location_id)->get();
        $param['people'] = \App\People::where('location_id', \Auth::user()->location_id)->get();
        $param['members'] = \App\Member::where('location_id', \Auth::user()->location_id)->get();
        $param['homecell'] = \App\Homecell::where('location_id', \Auth::user()->location_id)->get();
        $param['locs'] = \App\Location::find(\Auth::user()->location_id);
        $param['locations'] = \App\Location::where('id', \Auth::user()->location_id)->get();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }

        $param['fSvcTotal']  = \App\People::where('service_id',1)->where('location_id', \Auth::user()->location_id)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['secSvcTotal']  = \App\People::where('service_id',2)->where('location_id', \Auth::user()->location_id)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['thirdSvcTotal']  = \App\People::where('service_id',3)->where('location_id', \Auth::user()->location_id)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['forthSvcTotal']  = \App\People::where('service_id',4)->where('location_id', \Auth::user()->location_id)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['fifthSvcTotal']  = \App\People::where('service_id',5)->where('location_id', \Auth::user()->location_id)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['sixthSvcTotal']  = \App\People::where('service_id',6)->where('location_id', \Auth::user()->location_id)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        //GET New Converts Phone No\\
        $param['firststsvcconverts'] = \App\People::where('service_id',1)->where('location_id', \Auth::user()->location_id)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['secstsvcconverts'] = \App\People::where('service_id',2)->where('location_id', \Auth::user()->location_id)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['thirdstsvcconverts'] = \App\People::where('service_id',3)->where('location_id', \Auth::user()->location_id)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['fouthsvcconverts'] = \App\People::where('service_id',4)->where('location_id', \Auth::user()->location_id)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['fifthsvcconverts'] = \App\People::where('service_id',5)->where('location_id', \Auth::user()->location_id)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['sixthsvcconverts'] = \App\People::where('service_id',6)->where('location_id', \Auth::user()->location_id)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();

        //GET First Timers Phone No\\
        $param['fttmrs'] = \App\People::where('service_id',1)->where('location_id', \Auth::user()->location_id)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['sectmrs'] = \App\People::where('service_id',2)->where('location_id', \Auth::user()->location_id)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['thirdtmrs'] = \App\People::where('service_id',3)->where('location_id', \Auth::user()->location_id)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['forthtmrs'] = \App\People::where('service_id',4)->where('location_id', \Auth::user()->location_id)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['fifttmrs'] = \App\People::where('service_id',5)->where('location_id', \Auth::user()->location_id)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $param['sixtmrs'] = \App\People::where('service_id',6)->where('location_id', \Auth::user()->location_id)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();

        $param['firstMale'] = \App\ServiceAttendance::where('location_id', \Auth::user()->location_id)->where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();


        return view('home', $param);
    }


}
