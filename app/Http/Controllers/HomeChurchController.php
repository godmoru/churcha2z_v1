<?php
/*
Project: Membership/Information Management Software - Dunamis International Gospel Center, Abuja
File Name: HomeChurch Controller 
Description: Home Church management functionalities controller.
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


class HomeChurchController extends Controller
{
    
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	# code...
    }

    public function districts()

    {
    	$param['pageName'] = "Districts";
        $param['states'] = \App\State::all();
    	$param['districts'] = \App\District::where('status',1)->where('location_id', \Auth::user()->location_id)->orderBy('dis_name','asc')->get();
        $param['peoplecats'] = \App\PeopleCategory::where('status',1)->orderBy('cat_name', 'asc')->get();
        $param['pastors'] = \App\Pastor::where('location_id', \Auth::user()->location_id)->get();
    	return view('dhc.districts.index', $param);
    }
    
    public function oneDistrict($id)
    {
        $id = \Crypt::decrypt($id);
        $param['district'] = \App\District::find($id);
        return view('dhc.districts.viewone', $param);
    }

    public function newDistrict()
    {
        $inps = Input::all();
        // dd($inps);

        $district = new \App\District;

        $district->dis_name = $inps['disname'];
        $district->location_id = \Auth::user()->location_id;
        if ($inps['coordinator'] == 909090909) {
            $district->pastor_id = $inps['coordinator'];
            $district->coordinator_other_name = $inps['coordinator_other_name'];
            $district->coordinator_other_phone = $inps['coordinator_other_phone'];
        } else {
            $district->pastor_id = $inps['coordinator'];
            $district->coordinator_other_name = null;
            $district->coordinator_other_phone = null;
        }
        $district->phone1 = $inps['disphone1'];
        $district->dis_email = $inps['emailaddress'];
        $district->status = 1;
        $district->description = $inps['description'];
        // dd($district);
        $district->save();
        return redirect()->back();

    }
    public function printDistrictConverts($id)
    {
        $id = \Crypt::decrypt($id);
        $did = \App\District::find($id);
        // $converts = \DB::select("SELECT c.fullnames AS fullnames, c.id, c.service_id as Service, c.phone1 AS Phone1, c.email as email, c.dob AS DOB, l.loc_name as Location, cat.short_name AS Category from people c LEFT JOIN locations l ON c.location_id = l.id LEFT JOIN people_categories cat ON c.people_category_id = cat.id where c.service_date =".\Carbon\Carbon::now()->format('Y-m-d') );
            $converts = \App\People::where('location_id', \Auth::user()->location_id)->where('people_category_id',1)->where('location_area_id', $did->id)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();

        view('dhc.districts.printdistrictconverts', $converts);
            $pdf = \PDF::loadView('dhc.districts.printdistrictconverts', ['converts' => $converts], ['district' => $did], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'portrait');
            // return $pdf->download(''.date('d-m-Y').'-converts.pdf');
            return $pdf->stream(''.date('d-m-Y').'-converts.pdf');
    }

    public function printDistrictFirstTimers($id)
    {
        $id = \Crypt::decrypt($id);
        $did = \App\District::find($id);
        // $converts = \DB::select("SELECT c.fullnames AS fullnames, c.id, c.service_id as Service, c.phone1 AS Phone1, c.email as email, c.dob AS DOB, l.loc_name as Location, cat.short_name AS Category from people c LEFT JOIN locations l ON c.location_id = l.id LEFT JOIN people_categories cat ON c.people_category_id = cat.id where c.service_date =".\Carbon\Carbon::now()->format('Y-m-d') );
            $converts = \App\People::where('location_id', \Auth::user()->location_id)->where('people_category_id',2)->where('location_area_id', $did->id)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();

        view('dhc.districts.printdistrictconverts', $converts);
            $pdf = \PDF::loadView('dhc.districts.printdistrictfirsttimers', ['converts' => $converts, 'district' => $did], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'portrait');
            // return $pdf->download(''.date('d-m-Y').'-converts.pdf');
            return $pdf->stream(''.date('d-m-Y').'-converts.pdf');
    }

    public function printDailyEvangelism($id)
    {
        $inps = Input::all();

        $id = \Crypt::decrypt($id);
        $did = \App\District::find($id);
        // $converts = \DB::select("SELECT c.fullnames AS fullnames, c.id, c.service_id as Service, c.phone1 AS Phone1, c.email as email, c.dob AS DOB, l.loc_name as Location, cat.short_name AS Category from people c LEFT JOIN locations l ON c.location_id = l.id LEFT JOIN people_categories cat ON c.people_category_id = cat.id where c.service_date =".\Carbon\Carbon::now()->format('Y-m-d') );
            $converts = \App\People::where('location_id', \Auth::user()->location_id)->where('people_category_id',7)->where('location_area_id', $did->id)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();

        view('dhc.districts.printdistrictconverts', $converts);
            $pdf = \PDF::loadView('dhc.districts.printdistrictdailyevangelism', ['converts' => $converts, 'district' => $did], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'portrait');
            // return $pdf->download(''.date('d-m-Y').'-converts.pdf');
            return $pdf->stream(''.date('d-m-Y').'-converts.pdf');
    }

    public function printBasedResult($id)
    {
        $inps = Input::all();
        
        $id = \Crypt::decrypt($id);
        $did = \App\District::find($id);
        // $converts = \DB::select("SELECT c.fullnames AS fullnames, c.id, c.service_id as Service, c.phone1 AS Phone1, c.email as email, c.dob AS DOB, l.loc_name as Location, cat.short_name AS Category from people c LEFT JOIN locations l ON c.location_id = l.id LEFT JOIN people_categories cat ON c.people_category_id = cat.id where c.service_date =".\Carbon\Carbon::now()->format('Y-m-d') );
            $converts = \App\People::where('location_id', \Auth::user()->location_id)->where('people_category_id',6)->where('location_area_id', $did->id)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();

        view('dhc.districts.printdistrictconverts', $converts);
            $pdf = \PDF::loadView('dhc.districts.printdistrictdailyevangelism', ['converts' => $converts, 'district' => $did], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'portrait');
            // return $pdf->download(''.date('d-m-Y').'-converts.pdf');
            return $pdf->stream(''.date('d-m-Y').'-converts.pdf');
    }
    
    public function zones()
    {
        $param['pageName'] = "DHC Zones";
        $param['zones'] = \App\District::where('status',1)->orderBy('zone_name','asc')->get();
        $param['peoplecats'] = \App\PeopleCategory::where('status',1)->orderBy('cat_name', 'asc')->get();
        return view('dhc.zones.index', $param);
    }

    public function oneZone($id)
    {
        $id = \Crypt::decrypt($id);
        $param['zone'] = \App\Zone::find($id);
        return view('dhc.zones.oneview', $param);
    }

    public function newZone()
    {
        $inps = Input::all();
        $nZone = new \App\Zone;
        $nZone->zone_name = $inps['name'];
        $nZone->district_id = $inps['district'];
        $nZone->descriptions = $inps['description'];
        $nZone->created_by = \Auth::user()->id;
        $nZone->status = 1;
        // dd($nZone);
        $nZone->save();
        flash()->success('You have successfully created new zone to this district');
        return redirect()->back();
    }

    public function editZone($id)
    {
        # code...
    }

    public function deleteZone($id)
    {
        # code...
    }

    public function areas()
    {
        $param['pageName'] = "DHC Areas";
        $param['zones'] = \App\District::where('status',1)->orderBy('name','asc')->get();
        $param['peoplecats'] = \App\PeopleCategory::where('status',1)->orderBy('cat_name', 'asc')->get();
        return view('dhc.zones.index', $param);
    }

    public function oneArea($id)
    {
        $id = \Crypt::decrypt($id);
        $param['area'] = \App\Area::find($id);
        return view('dhc.areas.oneview', $param);
    }

    public function newArea()
    {
        $inps = Input::all();
        $nArea = new \App\Area;
        $nArea->name = $inps['name'];
        $nArea->district_id = $inps['district'];
        $nArea->zone_id = $inps['zone'];
        $nArea->descriptions = $inps['description'];
        $nArea->created_by = \Auth::user()->id;
        $nArea->status = 1;
        // dd($nZone);
        $nArea->save();
        flash()->success('You have successfully created new area to this zone');
        return redirect()->back();
    }

    public function editArea($id)
    {
        # code...
    }

    public function deleteArea($id)
    {
        # code...
    }


    public function homecells()
    {
        $param['pageName'] = "DHC Areas";
        $param['homecells'] = \App\Homecell::where('status',1)->orderBy('name','asc')->get();
        return view('dhc.homecells.index', $param);
    }

    public function oneHomecell($id)
    {
        $id = \Crypt::decrypt($id);
        $param['homecell'] = \App\Homecell::find($id);
        return view('dhc.homecells.profile', $param);
    }

    public function newHomecell()
    {
        $inps = Input::all();
        $area = \App\Area::find($inps['areaId']);
        $nHomecell = new \App\Homecell;
        $nHomecell->seek_code = "DHC-".mt_rand(4356,123456);
        $nHomecell->homecell_name = $inps['name'];
        $nHomecell->location_id = \Auth::user()->location_id;
        $nHomecell->district_id = $area->zone->district->id;
        $nHomecell->zone_id = $area->zone->id;
        $nHomecell->area_id = $area->id;
        $nHomecell->descriptions = $inps['description'];
        $nHomecell->created_by = \Auth::user()->id;
        $nHomecell->status = 1;
        $nHomecell->save();
        flash()->success('You have successfully created new homecell to this homecell to this area');
        return redirect()->back();
    }

    public function editHomecell($id)
    {
        # code...
    }

    public function deleteHomecell($id)
    {
        # code...
    }





}
