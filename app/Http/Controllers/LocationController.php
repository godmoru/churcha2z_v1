<?php

/*
Project: Membership/Information Management Software - Dunamis International Gospel Center, Abuja
File Name: Location Controller 
Description: Core Location management functionalities controller.
Author: Umoru Godfrey, E. 
Address: GESUSOFT Technology, Abuja Nigeria
godfrey.umoru@gesusoft.com
Date Created: 16th September, 2018.
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

ini_set('max_execution_time', 300);
ini_set('memory_limit', '-1');

class LocationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mail()
    {
            \Mail::to(\Auth::user()->email)->send(new NewLeaveMail(\Auth::user()->email, $email, $leaveType, $dateresumedfromprevLeave, $dateproceedingonleave, $personInAbsence, $subDate, $leaveNo, $names));
    }
    public function index()
    {
    	$param['pageName'] = "Location List";
    	$param['locations'] = \App\Location::where('id', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
    	$param['country'] = \App\Country::all();
        $param['people'] = \App\People::all();
        $param['pastors'] = \App\Pastor::all();
        $param['states'] = \App\State::all();
		$param['zones'] = \App\GeoPolZone::all();
		// $param['attendances'] = \App\Attendance::all();
		$param['members'] = \App\People::count();
		$param['members'] = \App\Member::count();
		$param['firsttimers'] = \App\People::Where('people_category_id', '=', '1')->count();
		$param['newconverts'] = \App\People::Where('people_category_id', '=', '2')->count();
		$param['evangelism'] = \App\People::Where('people_category_id', '=', '3')->count();
		$param['outreach_crusades'] = \App\People::Where('people_category_id', '=', '5')->count();
		$param['locations_all'] = \App\Location::count();
        return view('locations.index', $param);
    }
    
    public function foreignlocations()
    {
    	$param['pageName'] = "Location List";
    	$param['locations'] = \App\Location::where('country_id', '!=', '162')->orderBy('country_id', 'asc', 'name', 'asc')->get();
    	$param['country'] = \App\Country::all();
        $param['people'] = \App\People::all();
        $param['pastors'] = \App\Pastor::all();
        $param['states'] = \App\State::all();
		$param['zones'] = \App\GeoPolZone::all();
		// $param['attendances'] = \App\Attendance::all();
		$param['members'] = \App\People::count();
		$param['members'] = \App\Member::count();
		$param['firsttimers'] = \App\People::Where('people_category_id', '=', '1')->count();
		$param['newconverts'] = \App\People::Where('people_category_id', '=', '2')->count();
		$param['evangelism'] = \App\People::Where('people_category_id', '=', '3')->count();
		$param['outreach_crusades'] = \App\People::Where('people_category_id', '=', '5')->count();
		$param['locations_all'] = \App\Location::count();
        return view('locations.findex', $param);
    }

    public function new()
    {       $inps = Input::all();
    
            $locx = New \App\Location;
            $locx->loc_name = $inps['locName'];
            $locx->date_planted = $inps['dateplanted'];
            $locx->loc_add = $inps['locAddress'];
            $locx->loc_email = $inps['locMail'];
            $locx->pastor_id = $inps['residentpastor'];
            $locx->date_planted = $inps['dateplanted'];

            $locx->parent_location_id = $inps['plocation'];

            if ($inps['presidingpastor'] == 99999999) {
                $locx->presiding_pastor_id = $inps['presidingpastor'];
                $locx->presiding_pastor_other_name = $inps['presidingpastorothername'];
            } else {
                $locx->presiding_pastor_id = $inps['presidingpastor'];
                $locx->presiding_pastor_other_name = null;
            }

            if ($inps['firstresidentpastor'] == 99999999) {
                $locx->first_resident_pastor_id = $inps['firstresidentpastor'];
                $locx->first_resident_pastor_other_name = $inps['firstresidentpastorothername'];
            } else {
                $locx->first_resident_pastor_id = $inps['firstresidentpastor'];
                $locx->first_resident_pastor_other_name = null;
            }

            $locx->phone1 = $inps['phone1'];
            $locx->phone2 = $inps['phone2'];
            if ($inps['country'] == 162) {
                $locx->country_id = $inps['country'];
                $locx->id_state = $inps['state'];
                $locx->id_lg = $inps['lga'];
                $locx->province = null;
                $locx->id_zone = 1;
            } else {
                $locx->country_id = $inps['country'];
                $locx->id_state = 38;
                $locx->id_lg = 775;
                $locx->province = $inps['province'];
                $locx->id_zone = 2;
            }
            
            
            $locx->save();
            $pst = \App\Pastor::find($inps['residentpastor']);
            $pst->location_id = $locx->id;
            $pst->update();
               // flash()->success('You have successfully added new location to the system');
            return redirect()->back();
    }

    public function editLocation()
    { 
            $inps = Input::all();
            $locx = \App\Location::find($inps['locId']);
            $locx->loc_name = $inps['locName'];
            $locx->loc_add = $inps['locAddress'];
            $locx->loc_email = $inps['locMail'];
            $locx->phone1 = $inps['phone1'];
            $locx->phone2 = $inps['phone2'];
            $locx->pastor_id = $inps['residentpastor'];
            // dd($locx);
            $locx->update();
               flash()->success('You have successfully updated the location Information');
            return redirect()->back();
    }
    public function oneLocation($id)
    {
        /****** View One Location Info ********/
        $id = \Crypt::decrypt($id);
        $param['location'] = \App\Location::find($id);
        $param['locs'] = \App\Location::all();
        $param['states'] = \App\State::all();
        $param['zones'] = \App\GeoPolZone::all();
        $param['pas'] = \App\PeopleAwarenessSource::all();
    	$param['pageName'] = $param['location']->loc_name."'s Profile";
        // $param['pastors'] = \App\Pastor::where('id', '!=', $param['location']->get_loc_pst->id)->get();
         $param['pastors'] = \App\Pastor::all();
        // $param['peoplecats'] = \App\PeopleCategory::all();
        $param['peoplecats'] = \App\PeopleCategory::where('status',1)->orderBy('cat_name', 'asc')->get();
        $param['mstatus'] = \App\MaritalStatus::all();
        $param['homecells'] = \App\Homecell::all();
        $param['depts'] = \App\Workforcedept::all();
        $param['dept'] = \App\Workforcedept::all();
        $param['districts'] = \App\District::all();
        $param['roles'] = \App\Role::where('id', 17)->get();
        // $param['services'] = \App\Service::all();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::where('id',1)->get();
        } else {
            $param['services'] = \App\Service::all();
        }

        // flash()->success('Welcome to  '.  $param['location']->loc_name.' profile');

        return view('locations.viewone', $param);
    }
    
    public function editPlantingInfo()
    {
        $inps = Input::all();
        $loc = \App\Location::find($inps['location']);
        $loc->parent_location_id = $inps['parentlocation'];
        // $loc->presiding_pastor_id = $inps['presidingpastor'];
        $loc->date_planted = $inps['dateplanted'];
        if ($inps['presidingpastor'] !== 99999999) {
            $loc->presiding_pastor_id = $inps['presidingpastor'];
            $loc->presiding_pastor_other_name = null;
        } else {
            $loc->presiding_pastor_id = $inps['presidingpastor'];
            $loc->presiding_pastor_other_name = $inps['presidingpastorothername'];
        }
        if ($inps['firstresidentpastor'] == 99999999) {
                $loc->first_resident_pastor_id = $inps['firstresidentpastor'];
                $loc->first_resident_pastor_other_name = $inps['firstresidentpastorothername'];
            } else {
                $loc->first_resident_pastor_id = $inps['firstresidentpastor'];
                $loc->first_resident_pastor_other_name = null;
            }
            
        $loc->update();
        return back(); 
    }
    
    public function deleteLoc()
    {
        $inps = Input::all();
        $loc = \App\Location::find($inps['location']); //Find the selected row from the database and delete it.
        $pastor = \App\Pastor::find($loc->id); //Find the selected row from the database and delete it.
        $loc->delete(); 
        $pastor->location_id = null;
        $pastor->update();
        return redirect()->route('locations.index', \Crypt::encrypt('locations'));
    }
    
    public function changePastor()
    {
        $inps = Input::all();
        // dd($inps);

        $loc = \App\Location::find($inps['location']); //Find the selected row from the database and update it.
        $loc->pastor_id = $inps['residentpastor'];
        $loc->update();
        
        $pst = \App\Pastor::find($inps['residentpastor']);
        $pst->location_id = $loc->id;
        $pst->update();

        $locCPst = new \App\PastorLocationTransferHistory; //Find the selected row from the database and update it.
        $locCPst->new_location_id = $loc->id;
        $locCPst->old_location_id = $loc->id;
        $locCPst->pastor_id = $inps['residentpastor'];
        $locCPst->transfer_type = $inps['reasonType'];
        $locCPst->transfer_note = $inps['reason'];
        $locCPst->transfer_in_date = \Carbon\Carbon::now()->format('Y-m-d');
        $locCPst->transfer_out_date = null;
        $locCPst->transfer_note = $inps['reason'];
        $locCPst->transfer_by = \Auth::user()->id;
        $locCPst->status = 1;
        $locCPst->save(); 
        return back();
    }
    
    
    public function submitVAttendance()
    {
    	$inps = Input::all();

    	// dd($inps);
        foreach ($inps['VcAreaId'] as $key => $v)
         {       
            $vAttData = [
                 
                 'location_id'  => \Auth::user()->location_id,
                 'submited_by' => \Auth::user()->id,
                 'service_id' => $inps['svc'],
                 'vehicle_counting_area_id' => $v,
                 'service_type_id' => $inps['svctype'],
                 'status' => 1,
                 'total' => $inps['total'] [$key],
                 'service_date'  => $inps['serviceDate']//\Carbon\Carbon::now()->format('Y-m-d')
                ];
                \App\VehicleAttendance::insert($vAttData);
        }

        return redirect()->back();
    }

    public function addvAttendance()
    {
    	$param['pageName'] = \Auth::user()->location->loc_name ." Add Vehicle Attendance";
        $param['locations'] = \App\Location::find(\Auth::user()->location_id);
        // $param['attendances'] = \App\ServiceAttendance::where('status', '!=', '')->orderBy('service_date', 'ASC')->get();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }
		$param['serviceTypes'] = \App\ServiceType::all();
        $param['Vcountareas'] = \App\VehicleCountingArea::all();

        return view('locations.addvehicleattendance', $param);
    }
    
    public function specialAttendnce()
    {
    	$param['pageName'] = \Auth::user()->location->loc_name ." Add Special Attendance";
        $param['locations'] = \App\Location::find(\Auth::user()->location_id);
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }
		$param['serviceTypes'] = \App\ServiceType::all();
        $param['countareas'] = \App\SpecialAttendanceHead::all();

        return view('locations.addspecialattendance', $param);

    }
    
    public function doSpecialAttendance()
    {
    	$inps = Input::all();

    	// dd($inps);
        foreach ($inps['specialheadid'] as $key => $v)
         {       
            $SpAttData = [
                 
                 'location_id'  => \Auth::user()->location_id,
                 'submited_by' => \Auth::user()->id,
                 'service_id' => $inps['svc'],
                 'special_attendance_head_id' => $v,
                 'service_type_id' => $inps['svctype'],
                 'status' => 1,
                 'male' => $inps['male'] [$key],
                 'female' => $inps['female'] [$key],
                 'children' => $inps['children'] [$key],
                 'service_date'  => $inps['serviceDate']//\Carbon\Carbon::now()->format('Y-m-d')
                ];
                \App\SpecialAttendance::insert($SpAttData);
        }

        return redirect()->back();
    }
    
    
    public function submitAttendance()
    {

    	$inps = Input::all();
        foreach ($inps['cAreaId'] as $key => $Ch)
         {       
            $hAttData = [
                 
                 'location_id'  => \Auth::user()->location_id,
                 'user_id' => \Auth::user()->id,
                 'service_id' => $inps['svc'],
                 'count_area_classification' => $inps['count_area_classification'],
                 'count_area_id' => $Ch,
                 'service_type_id' => $inps['svctype'],
                 'status' => 1,
                 'male' => $inps['male'] [$key],
                 'female' => $inps['female'] [$key],
                 'children' => $inps['children'] [$key],
                 'first_timers' => 0,//$inps['total'] [$key],
                 'new_converts' => 0,//$inps['total'] [$key],
                 'service_date'  => $inps['serviceDate']//\Carbon\Carbon::now()->format('Y-m-d')
                ];
                // dd($hAttData);
                \App\ServiceAttendance::insert($hAttData);
        }

           flash()->success('You have successfully submited the location attendace for the selected service. Thank you.');
        return redirect()->back();
    }
    
    // public function submitAttendance()
    // {
    //     $inps = Input::all();
    //     foreach ($inps['VcAreaId'] as $key => $v)
    //      {       
    //         $vAttData = [
                 
    //              'location_id'  => \Auth::user()->location_id,
    //              'submited_by' => \Auth::user()->id,
    //              'service_id' => $inps['svc'],
    //              'vehicle_counting_area_id' => $v,
    //              'service_type_id' => $inps['svctype'],
    //              'status' => 1,
    //              'total' => $inps['total'] [$key],
    //              'service_date'  => $inps['serviceDate']//\Carbon\Carbon::now()->format('Y-m-d')
    //             ];
    //             \App\VehicleAttendance::insert($vAttData);
    //     }

    //     foreach ($inps['cAreaId'] as $key => $Ch)
    //      {       
    //         $hAttData = [
                 
    //              'location_id'  => \Auth::user()->location_id,
    //              'user_id' => \Auth::user()->id,
    //              'service_id' => $inps['svc'],
    //              'count_area_id' => $Ch,
    //              'service_type_id' => $inps['svctype'],
    //              'status' => 1,
    //              'male' => $inps['male'] [$key],
    //              'female' => $inps['female'] [$key],
    //              'children' => $inps['children'] [$key],
    //              'first_timers' => 0,//$inps['total'] [$key],
    //              'new_converts' => 0,//$inps['total'] [$key],
    //              'service_date'  => $inps['serviceDate']//\Carbon\Carbon::now()->format('Y-m-d')
    //             ];
    //             // dd($hAttData);
    //             \App\ServiceAttendance::insert($hAttData);
    //     }

    //       flash()->success('You have successfully submited the location attendace for the selected service. Thank you.');
    //     return redirect()->back();
    // }

    public function showAttendance()
    {
        
        $param['pageName'] = \Auth::user()->location->loc_name ." Attendance Index";
        $param['locations'] = \App\Location::find(\Auth::user()->location_id);
        // $param['attendances'] = \App\ServiceAttendance::where('status', '!=', '')->orderBy('service_date', 'ASC')->get();
        $param['attendances'] = \App\ServiceAttendance::where('status',1)->where('user_id', \Auth::user()->id)->groupBy('service_date')->groupBy('service_id')->orderBy('service_date', 'desc')->get();
        // $param['services'] = \App\Service::all();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }

        $param['serviceTypes'] = \App\ServiceType::all();
        $param['countareas'] = \App\CountingArea::all();
        $param['Vcountareas'] = \App\VehicleCountingArea::all();
        return view('locations.attIndex', $param);
    }

    public function donew()
    {
        $param['pageName'] = \Auth::user()->location->loc_name ." Add Attendance";
        $param['locations'] = \App\Location::find(\Auth::user()->location_id);
        // $param['attendances'] = \App\ServiceAttendance::where('status', '!=', '')->orderBy('service_date', 'ASC')->get();
        $param['attendances'] = \App\ServiceAttendance::where('status',1)->where('user_id', \Auth::user()->id)->groupBy('service_date')->groupBy('service_id')->orderBy('service_date', 'desc')->get();
        // $param['services'] = \App\Service::all();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }

        $param['serviceTypes'] = \App\ServiceType::all();
        $param['countareas'] = \App\CountingArea::where('area_in', 1)->get();
        //$param['countareas'] = \App\CountingArea::all();
        $param['Vcountareas'] = \App\VehicleCountingArea::all();

        return view('locations.newattendance', $param);
    }
    
    public function showunderGalleryAtt()
    {
    	$param['pageName'] = "Under Gallery Add Attendance";
        $param['locations'] = \App\Location::find(\Auth::user()->location_id);
        // $param['attendances'] = \App\ServiceAttendance::where('status', '!=', '')->orderBy('service_date', 'ASC')->get();
        $param['attendances'] = \App\ServiceAttendance::where('status',1)->where('user_id', \Auth::user()->id)->groupBy('service_date')->groupBy('service_id')->orderBy('service_date', 'desc')->get();
        // $param['services'] = \App\Service::all();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }

        $param['serviceTypes'] = \App\ServiceType::all();
        $param['countareas'] = \App\CountingArea::where('area_in', 2)->get();
        return view('locations.addundergalleryattendance', $param);
    }

     public function showGalleryIAtt()
    {
    	$param['pageName'] = "Gallery I Add Attendance";
        $param['locations'] = \App\Location::find(\Auth::user()->location_id);
        // $param['attendances'] = \App\ServiceAttendance::where('status', '!=', '')->orderBy('service_date', 'ASC')->get();
        $param['attendances'] = \App\ServiceAttendance::where('status',1)->where('user_id', \Auth::user()->id)->groupBy('service_date')->groupBy('service_id')->orderBy('service_date', 'desc')->get();
        // $param['services'] = \App\Service::all();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }

        $param['serviceTypes'] = \App\ServiceType::all();
        $param['countareas'] = \App\CountingArea::where('area_in', 3)->get();
        return view('locations.addgallery1', $param);
    }

    public function showGalleryIIAtt()
    {
    	$param['pageName'] = "Gallery II Add Attendance";
        $param['locations'] = \App\Location::find(\Auth::user()->location_id);
        // $param['attendances'] = \App\ServiceAttendance::where('status', '!=', '')->orderBy('service_date', 'ASC')->get();
        $param['attendances'] = \App\ServiceAttendance::where('status',1)->where('user_id', \Auth::user()->id)->groupBy('service_date')->groupBy('service_id')->orderBy('service_date', 'desc')->get();
        // $param['services'] = \App\Service::all();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }

        $param['serviceTypes'] = \App\ServiceType::all();
        $param['countareas'] = \App\CountingArea::where('area_in', 4)->get();
        return view('locations.addgalleryii', $param);
    }

    public function showOverflowAtt()
    {
    	$param['pageName'] = "Overflows Add Attendance";
        $param['locations'] = \App\Location::find(\Auth::user()->location_id);
        // $param['attendances'] = \App\ServiceAttendance::where('status', '!=', '')->orderBy('service_date', 'ASC')->get();
        $param['attendances'] = \App\ServiceAttendance::where('status',1)->where('user_id', \Auth::user()->id)->groupBy('service_date')->groupBy('service_id')->orderBy('service_date', 'desc')->get();
        // $param['services'] = \App\Service::all();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }

        $param['serviceTypes'] = \App\ServiceType::all();
        $param['countareas'] = \App\CountingArea::where('area_in', 5)->get();
        return view('locations.addoverflowattendance', $param);
    }
    
     public function showAdditionalAtt()
    {
    	$param['pageName'] = "Additional Add Attendance";
        $param['locations'] = \App\Location::find(\Auth::user()->location_id);
        // $param['attendances'] = \App\ServiceAttendance::where('status', '!=', '')->orderBy('service_date', 'ASC')->get();
        $param['attendances'] = \App\ServiceAttendance::where('status',1)->where('user_id', \Auth::user()->id)->groupBy('service_date')->groupBy('service_id')->orderBy('service_date', 'desc')->get();
        // $param['services'] = \App\Service::all();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::where('id',1)->get();
        } else {
            $param['services'] = \App\Service::all();
        }

        $param['serviceTypes'] = \App\ServiceType::all();
        $param['countareas'] = \App\CountingArea::where('area_in', 6)->get();
        return view('locations.additionalattendance', $param);
    }
    
    public function countAreas()
    {
        $param['pageName'] = \Auth::user()->location->loc_name ." Attendance Count Areas";
        $param['countareas'] = \App\CountingArea::where('status',1)->get();
        return view('locations.countareas', $param);

    }
    
     public function updateCountArea()
    {
    	$inps = Input::all();
        $c_area = \App\CountingArea::find($inps['id']);
        $c_area->name = $inps['name'];
        $c_area->description = $inps['description'];
        $c_area->update();
        return redirect()->back();
    }

    public function deleteCountArea()
    {
        $inps = Input::all();
    	$c_area = \App\CountingArea::find($inps['id']); //Find the selected row from the database and delete it.
        $c_area->delete();	
        return back();
    }
    
    
    public function showCountAreas()
    {
        $param['pageName'] = \Auth::user()->location->loc_name ." Attendance Source";
        $param['attendances'] = \App\ServiceAttendance::where('status',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->groupBy('service_date')->orderBy('service_date', 'desc')->orderBy('service_id', 'desc')->get();
        $param['countareas'] = \App\CountingArea::where('status',1)->get();
        $param['serviceTypes'] = \App\ServiceType::where('status',1)->get();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }
        return view('locations.attsummarysource', $param);

    }
    
    public function showCountAreasByDate()
    {
        $inps = Input::all();
        // dd($inps);
        $param['datefrom'] = $inps['datefrom'];
        $param['pageName'] = \Auth::user()->location->loc_name ." Attendance Source For " .$inps['datefrom'];
        $param['serviceTypes'] = \App\ServiceType::where('status',1)->get();
        $param['attendances'] = \App\ServiceAttendance::where('status',1)->where('service_date', $inps['datefrom'])->where('service_type_id', $inps['svctype'])->where('service_id', $inps['svc'])->orderBy('count_area_id', 'asc')->get();
        $param['countareas'] = \App\CountingArea::where('status',1)->get();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }
        return view('locations.attsummarysourcebydate', $param);

    }
    
    public function updateAttRecordX()
    {
        $inps = Input::all();
        // dd($inps);
    	$serVAtt = \App\ServiceAttendance::find($inps['id']); //Find the selected row from the database and update it.
    	$serVAtt->male = $inps['male'];
    	$serVAtt->female = $inps['female'];
    	$serVAtt->children = $inps['children'];
        $serVAtt->update();	
        return back()->with()->$inps;
        // return redirect()->route('locations.show-attendance-details-date')->with($inps);
    }
    
    public function updateAttRecord()
    {
        $inps = Input::all();
    	$serVAtt = \App\ServiceAttendance::find($inps['id']); //Find the selected row from the database and update it.
    	$serVAtt->male = $inps['male'];
    	$serVAtt->female = $inps['female'];
    	$serVAtt->children = $inps['children'];
        $serVAtt->update();	
        return redirect()->back();
    }

    public function deleteAttRecord()
    {
        $inps = Input::all();
    	$serVAtt = \App\ServiceAttendance::find($inps['id']); //Find the selected row from the database and delete it.
        $serVAtt->delete();	
        return redirect()->back();
    }
    

    public function showprint()
    {
        $param['pageName'] = \Auth::user()->location->loc_name ." Attendance Statistics";
        $param['locations'] = \App\Location::find(\Auth::user()->location_id);
        // $param['attendances'] = \App\ServiceAttendance::where('status', '!=', '')->orderBy('service_date', 'ASC')->get();
        $param['attendances'] = \App\ServiceAttendance::where('status',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->groupBy('service_date')->groupBy('service_id')->orderBy('service_date', 'desc')->orderBy('service_id', 'desc')->get();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }
        
        $param['serviceTypes'] = \App\ServiceType::all();
        $param['countareas'] = \App\CountingArea::all();
        $param['Vcountareas'] = \App\VehicleCountingArea::all();
        return view('locations.printattendance', $param);
    }

    public function printReport($id)
    {   
        $id = \Crypt::decrypt($id);
        $param['service'] = \App\Service::find($id);
        $param['svcAtt'] = \App\ServiceAttendance::where('service_id', $param['service']->id)->get();
        view('locations.printreport', $param);
            $pdf = \PDF::loadView('locations.printreport', ['svcAtt' => $param['svcAtt'], 'service' => $param['service']], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'portrait');
            return $pdf->stream(\Auth::user()->location->loc_name .' Attendance on the '. date('M dS, Y').'.pdf');
            // return $pdf->download(\Auth::user()->location->loc_name .' Attendance on the '. date('M dS, Y').'.pdf');
            // return $pdf->stream(''.date('d-m-Y').'-Attendance.pdf');
    }

    public function printServiceSummary($id)
    {   
        $id = \Crypt::decrypt($id);
        $param['service'] = \App\Service::find($id);
        $param['svcAttData'] = \App\ServiceAttendance::where('service_id', $param['service']->id)->get();
        view('locations.servicesummary', $param);
           $pdf = \PDF::loadView('locations.servicesummary', ['svcAttData' => $param['svcAttData'], 'service' => $param['service']], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'portrait');
           return $pdf->stream(\Auth::user()->location->loc_name .' Vehicle Count on the '. date('M dS, Y').'.pdf');
            // return $pdf->stream(''.date('d-m-Y').'-Attendance.pdf');
    }

    public function printSummary()
    {   
        // $id = \Crypt::decrypt($id);
        // $param['services'] = \App\Service::all();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }

        view('locations.printsummaryii', $param);
        $pdf = \PDF::loadView('locations.printsummaryii', ['services' => $param['services']], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'landscape');
        return $pdf->stream(\Auth::user()->location->loc_name .' Attendance Summary for '. date('M dS, Y').'.pdf');
        // return $pdf->download(\Auth::user()->location->loc_name .' Attendance Summary for '. date('M dS, Y').'.pdf');
            // return $pdf->stream(''.date('d-m-Y').'-Attendance.pdf');
    }
    
    public function printCustomDates()
    {
    	$inps = Input::all();

    	// dd($inps);

        if ($inps['svc'] == 999999) {
	        $param['mbmals'] = \App\ServiceAttendance::where('count_area_classification', 1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('male');
	        $param['mbfems'] = \App\ServiceAttendance::where('count_area_classification', 1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('female');
	        $param['mbchild'] = \App\ServiceAttendance::where('count_area_classification', 1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('children');

	        $param['undglrymals'] = \App\ServiceAttendance::where('count_area_classification', 2)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('male');
        	$param['undglryfems'] = \App\ServiceAttendance::where('count_area_classification', 2)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('female');
        	$param['undglrychild'] = \App\ServiceAttendance::where('count_area_classification', 2)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('children');

        	$param['glry1mals'] = \App\ServiceAttendance::where('count_area_classification', 3)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('male');
	        $param['glry1fems'] = \App\ServiceAttendance::where('count_area_classification', 3)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('female');
	        $param['glry1child'] = \App\ServiceAttendance::where('count_area_classification', 3)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('children');

	        $param['glry2mals'] = \App\ServiceAttendance::where('count_area_classification', 4)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('male');
	        $param['glry2fems'] = \App\ServiceAttendance::where('count_area_classification', 4)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('female');
	        $param['glry2child'] = \App\ServiceAttendance::where('count_area_classification', 4)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('children');

	        $param['ovrflowmals'] = \App\ServiceAttendance::where('count_area_classification', 5)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('male');
	        $param['ovrflowfems'] = \App\ServiceAttendance::where('count_area_classification', 5)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('female');
	        $param['ovrflowchild'] = \App\ServiceAttendance::where('count_area_classification', 5)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('children');
	        
	        $param['additinoalmals'] = \App\ServiceAttendance::where('count_area_classification', 6)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('male');
	        $param['additinoalfems'] = \App\ServiceAttendance::where('count_area_classification', 6)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('female');
	        $param['additinoalchild'] = \App\ServiceAttendance::where('count_area_classification', 6)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('children');


	        $param['spACMale'] = \App\SpecialAttendance::where('special_attendance_head_id', 1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('male');
	        $param['spACFemale'] = \App\SpecialAttendance::where('special_attendance_head_id', 1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('female');
	        $param['spACChildren'] = \App\SpecialAttendance::where('special_attendance_head_id', 1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('children');


	        $param['spFTMale'] = \App\SpecialAttendance::where('special_attendance_head_id', 2)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('male');
	        $param['spFTFemale'] = \App\SpecialAttendance::where('special_attendance_head_id', 2)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('female');
	        $param['spFTChildren'] = \App\SpecialAttendance::where('special_attendance_head_id', 2)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('children');


	        $param['spHLMale'] = \App\SpecialAttendance::where('special_attendance_head_id', 3)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('male');
	        $param['spHLFemale'] = \App\SpecialAttendance::where('special_attendance_head_id', 3)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('female');
	        $param['spHLChildren'] = \App\SpecialAttendance::where('special_attendance_head_id', 3)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('children');
	        

	        $param['VAtt'] = \App\VehicleAttendance::whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->sum('total');
	        $param['dfrom'] = $inps['datefrom'];
	        $param['dto'] = $inps['dateto'];



	        // $pdf = \PDF::loadView('locations.printsummaryii', ['services' => $param['services']], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'landscape');
        	// return $pdf->stream(\Auth::user()->location->loc_name .' Attendance Summary for '. date('M dS, Y').'.pdf');


	        return view('locations.printsummarybydate', $param);

    	} else {

    		$param['mbmals'] = \App\ServiceAttendance::where('count_area_classification', 1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('male');
	        $param['mbfems'] = \App\ServiceAttendance::where('count_area_classification', 1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('female');
			$param['mbchild'] = \App\ServiceAttendance::where('count_area_classification', 1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('children');

	        $param['undglrymals'] = \App\ServiceAttendance::where('count_area_classification', 2)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('male');
        	$param['undglryfems'] = \App\ServiceAttendance::where('count_area_classification', 2)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('female');
        	$param['undglrychild'] = \App\ServiceAttendance::where('count_area_classification', 2)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('children');


			$param['glry1mals'] = \App\ServiceAttendance::where('count_area_classification', 3)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('male');
			$param['glry1fems'] = \App\ServiceAttendance::where('count_area_classification', 3)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('female');
			$param['glry1child'] = \App\ServiceAttendance::where('count_area_classification', 3)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('children');


			$param['glry2mals'] = \App\ServiceAttendance::where('count_area_classification', 4)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('male');
	        $param['glry2fems'] = \App\ServiceAttendance::where('count_area_classification', 4)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('female');
	        $param['glry2child'] = \App\ServiceAttendance::where('count_area_classification', 4)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('children');


			$param['glry2mals']  = \App\ServiceAttendance::where('count_area_classification', 4)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('male');
			$param['glry2fems']  = \App\ServiceAttendance::where('count_area_classification', 4)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('female');
			$param['glry2child']  = \App\ServiceAttendance::where('count_area_classification', 4)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('children');

			$param['ovrflowmals']  = \App\ServiceAttendance::where('count_area_classification', 5)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('male');
			$param['ovrflowfems'] = \App\ServiceAttendance::where('count_area_classification', 5)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('female');
			$param['ovrflowchild']  = \App\ServiceAttendance::where('count_area_classification', 5)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('children');

			$param['additinoalmals'] = \App\ServiceAttendance::where('count_area_classification', 6)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('male');
	        $param['additinoalfems'] = \App\ServiceAttendance::where('count_area_classification', 6)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('female');
	        $param['additinoalchild'] = \App\ServiceAttendance::where('count_area_classification', 6)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('children');

	        

			$param['spACMale'] = \App\SpecialAttendance::where('special_attendance_head_id', 1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('male');
	        $param['spACFemale'] = \App\SpecialAttendance::where('special_attendance_head_id', 1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('female');
	        $param['spACChildren'] = \App\SpecialAttendance::where('special_attendance_head_id', 1)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('children');


	        $param['spFTMale'] = \App\SpecialAttendance::where('special_attendance_head_id', 2)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('male');
	        $param['spFTFemale'] = \App\SpecialAttendance::where('special_attendance_head_id', 2)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('female');
	        $param['spFTChildren'] = \App\SpecialAttendance::where('special_attendance_head_id', 2)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('children');


	        $param['spHLMale'] = \App\SpecialAttendance::where('special_attendance_head_id', 3)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('male');
	        $param['spHLFemale'] = \App\SpecialAttendance::where('special_attendance_head_id', 3)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('female');
	        $param['spHLChildren'] = \App\SpecialAttendance::where('special_attendance_head_id', 3)->whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('children');


	        $param['VAtt'] = \App\VehicleAttendance::whereBetween('service_date', [$inps['datefrom'], $inps['dateto']])->where('service_id', $inps['svc'])->sum('total');

	        
	        $param['dfrom'] = $inps['datefrom'];
	        $param['dto'] = $inps['dateto'];
	        
	        return view('locations.printsummarybydate', $param);

    	}
 
    }

    public function printVReport($id)
    {   
        $id = \Crypt::decrypt($id);
        $param['service'] = \App\Service::find($id);
        $param['svcAtt'] = \App\VehicleAttendance::where('service_id', $param['service']->id)->groupBy('service_id')->get();
        view('locations.printvreport', $param);
            $pdf = \PDF::loadView('locations.printvreport', ['svcAtt' => $param['svcAtt'], 'service' => $param['service']], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'portrait');
            return $pdf->stream(\Auth::user()->location->loc_name .' Vehicle Count on the '. date('M dS, Y').'.pdf');

            //return $pdf->stream(''.date('d-m-Y').'-Attendance.pdf');

    }
    public function newCountArea()
    {
        $inps = Input::all();
        $c_area = New \App\CountingArea;
        $c_area->name = $inps['name'];
        $c_area->description = $inps['description'];
        $c_area->area_in = $inps['areain'];
        $c_area->count_area_classification = $inps['areain'];
        $c_area->location_id = \Auth::user()->location_id;
        $c_area->created_by = \Auth::user()->id;
        $c_area->status = 1;
        $c_area->save();
        return redirect()->back();
    }
    
    public function newCarPark()
    {
        $inps = Input::all();
        $park = New \App\VehicleCountingArea;
        $park->name = $inps['name'];
        $park->description = $inps['description'];
        $park->location_id = \Auth::user()->location_id;
        $park->created_by = \Auth::user()->id;
        $park->status = 1;
        $park->save();
        return redirect()->back();
    }

    public function newServiceType()
    {
        $inps = Input::all();
        $n_ServType = New \App\ServiceType;
        $n_ServType->name = $inps['name'];
        $n_ServType->description = $inps['description'];
        $n_ServType->location_id = \Auth::user()->location_id;
        $n_ServType->created_by = \Auth::user()->id;
        $n_ServType->status = 1;
        $n_ServType->save();
        return redirect()->back();
    }
    
    public function GenWKReports()
    {
        $param['pageName'] = "General Weekly Report";
        // $param['locations'] = \App\Location::where('status',1)->get();
        $param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        $sdate = 2015; //Start Year = defined year (1981)
        $edate = date("Y"); //End Year = Current Year
        $years = range ($sdate,$edate);
        $param['years'] = $years;
        $param['serviceTypes'] = \App\ServiceType::all();
        $param['pastors'] = \App\Pastor::where('location_id', \Auth::user()->location_id)->get();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }

        return view('locations.genweeklyreport', $param);

    }

    public function WKReports()
    {
        $param['pageName'] = \Auth::user()->location->loc_name ." Weekly Report";
        // $param['locations'] = \App\Location::where('status',1)->get();
        $param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        $sdate = 2015; //Start Year = defined year (1981)
        $edate = date("Y"); //End Year = Current Year
        $years = range ($sdate,$edate);
        $param['years'] = $years;
        $param['serviceTypes'] = \App\ServiceType::all();
        $param['pastors'] = \App\Pastor::where('location_id', \Auth::user()->location_id)->get();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }

        return view('locations.weeklyreports', $param);

    }
    
    public function WKReports2()
    {
        $param['pageName'] = \Auth::user()->location->loc_name ." ". date("F, Y")." Weekly Report";
        $param['locations'] = \App\Location::where('id', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        $sdate = 2015; //Start Year = defined year (1981)
        $edate = date("Y"); //End Year = Current Year
        $years = range ($sdate,$edate);
        $param['years'] = $years;
        $param['serviceTypes'] = \App\ServiceType::all();
        $param['pastors'] = \App\Pastor::where('location_id', \Auth::user()->location_id)->get();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }

        return view('locations.weeklyreports2', $param);

    }
    
    
     public function getReportByDate()
    {
        $inps = Input::all();
        $dateDay = \Carbon\Carbon::now();//use your date to get month and year
        $year = $dateDay->year;
        $month = $inps['month'];
        //$month = $dateDay->month;
        $days = $dateDay->daysInMonth;
        $wednesday=[];
        $sundays=[];
        foreach (range(1, $days) as $day) {
            $date = \Carbon\Carbon::createFromDate($year, $month, $day);
            if ($date->isWednesday()===true) {
                $wednesday[]=($date->day);
            }
            if ($date->isSunday()===true) {
                $sundays[]=($date->day);
            }
        }
      
  	    $param['mSundays'] = count($sundays);
        $param['mWednesdays'] = count($wednesday);
        $param['locations'] = \App\Location::where('id', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        $param['year'] = $inps['year'];
        $param['month'] = $inps['month'];
        
        return view('locations.printbymonth', $param);
    }
    
        public function  newWklReport()
    {
        $param['pageName'] = \Auth::user()->location->loc_name ." Weekly Report";
        $sdate = 2015; //Start Year = defined year (1981)
        $edate = date("Y"); //End Year = Current Year
        $years = range ($sdate,$edate);
        $param['years'] = $years;
        // $param['serviceTypes'] = \App\ServiceType::all();
        $param['serviceTypes'] = \App\ServiceType::where('priority', 1)->get();
        $param['pastors'] = \App\Pastor::where('location_id', \Auth::user()->location_id)->get();
                $param['reports'] = \App\WeeklyReport::latest()->first();

        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }
        return view('locations.submitweeklyreport2', $param);
    }
    public function printWeekReport()

    {
        view('locations.printweekreport2');
            $param['reports'] = \App\WeeklyReport::latest()->first();
            return view('locations.printweekreport2', $param);
            // $pdf = \PDF::loadView('locations.printweekreport2', [ ], ['dpi' => 100, 'defaultFont' => 'Arial', 'reports' => $reports])->setPaper('a4', 'landscape');
            // return $pdf->stream(\Auth::user()->location->loc_name .' Summary of '.\Carbon\Carbon::now()->weekOfMonth.' Week, '. date('F, Y').'.pdf');
    }

    
       public function LocMonthlyReport()
    {
        $param['pageName'] = \Auth::user()->location->loc_name ." Yearly Report";
        $param['locations'] = \App\Location::where('id',\Auth::user()->location_id)->get();
        return view('locations.mymonthreport', $param);
    }

    public function printLocMonthReport()

    {
        return view('locations.printmymonthreport');
            // $pdf = \PDF::loadView('locations.printyearreport', [ ], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'landscape');
            // return $pdf->stream(\Auth::user()->location->loc_name .' Report Summary for '. date('Y').'.pdf');
    }

    public function LocYearlyReport()
    {
        $param['pageName'] = \Auth::user()->location->loc_name ." Yearly Report";
        return view('locations.mymonthlyreport', $param);
    }

    public function printLocYearReport()

    {
        return view('locations.printyearreport');
            // $pdf = \PDF::loadView('locations.printyearreport', [ ], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'landscape');
            // return $pdf->stream(\Auth::user()->location->loc_name .' Report Summary for '. date('Y').'.pdf');
    }
    
    public function submitweeklyReport()
    {   
        $inps = Input::all();
        $weekrep = new \App\WeeklyReport;
        $weekrep->location_id = \Auth::user()->location_id;
        // $weekrep->service_type_id = $inps['svctype'];
        if(!$inps['svctype'] == 9000) {
            $weekrep->service_type_id = $inps['svctype'];
            $weekrep->service_type_other_id = null;
        } else {
            $weekrep->service_type_id = $inps['svctype'];
            $weekrep->service_type_other_id = $inps['svctype_other'];
        }
        $weekrep->service_id = $inps['svc'];
        $weekrep->service_date = $inps['serviceDate'];
        $weekrep->week = $inps['week'];
        $year = new \DateTime($inps['serviceDate']);
        $month = new \DateTime($inps['serviceDate']);

        $weekrep->year = $year->format('Y');
        $weekrep->month = $month->format('m');
        $weekrep->attendance_male = $inps['male'];
        $weekrep->attendance_female = $inps['female'];
        $weekrep->attendance_children = $inps['children'];
        // $weekrep->offering_cash = $inps['offering_cash'];
        // $weekrep->offering_pos = $inps['offering_pos'];
        // $weekrep->offering_cheque = $inps['offering_transfer'];
        // $weekrep->offering_amount = $inps['offerings'];
        // $weekrep->tithe_cash = $inps['tithes_cash'];
        // $weekrep->tithe_pos = $inps['tithes_pos'];
        // $weekrep->tithe_cheque = $inps['tithes_transfer'];
        // $weekrep->tithe_amount = $inps['tithes'];
        $weekrep->new_converts = $inps['newconverts'];
        $weekrep->first_timers = $inps['firsttimers'];
        $weekrep->message_title = $inps['messagetitle'];
            if(!$inps['preacher'] == 909090909) {
                $weekrep->preacher = $inps['preacher'];
                $weekrep->preacher_other_name = null;
                $weekrep->preacher_other_ministry = null;
            } else {
                $weekrep->preacher = $inps['preacher'];
                $weekrep->preacher_other_name = $inps['preacher_other_name'];
                $weekrep->preacher_other_ministry = $inps['preacher_other_ministry'];
            }
            
        $weekrep->submited_by = \Auth::user()->id;
        $weekrep->status = 1;

        // dd($weekrep);
        $weekrep->save();
        return redirect()->back();

    }

    public function printWeeklyReport()
    {
        // $id = \Crypt::decrypt($id);
        view('locations.printweeklyreport');
            $pdf = \PDF::loadView('locations.printweeklyreport', [ ], ['dpi' => 100, 'defaultFont' => 'Arial'])->setPaper('a4', 'landscape');
            return $pdf->stream(\Auth::user()->location->loc_name .' Weekly Report For '. date('F, Y').'.pdf');
    }

    public function printGenWeeklyReport()
    {
        // $param['locations'] = \App\Location::where('status',1)->get();
        $param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return view('locations.printgenweeklyreport', $param);
    }

    public function printYearlyReport()
    {
        // $param['locations'] = \App\Location::where('status',1)->get();
        $param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return view('locations.printyearlyreport2', $param);
    }
    
    
    public function printWeekGenReport()
    {
        $param['locations'] = \App\Location::where('status',1)->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return view('locations.printweekreportGen', $param);
    }

    public function printMonthGenReport()
    {
        $dateDay = \Carbon\Carbon::now();//use your date to get month and year
        $year = $dateDay->year;
        $month = $dateDay->month;
        $days = $dateDay->daysInMonth;
        $wednesday=[];
        $sundays=[];
        $tuesdays=[];
        foreach (range(1, $days) as $day) {
            $date = \Carbon\Carbon::createFromDate($year, $month, $day);
            if ($date->isWednesday()===true) {
                $wednesday[]=($date->day);
            }
            if ($date->isSunday()===true) {
                $sundays[]=($date->day);
            }
        }
        $param['mSundays'] = count($sundays);
        $param['mWednesdays'] = count($wednesday);
  
        $param['locations'] = \App\Location::where('status',1)->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return view('locations.printmonthreportGen', $param);
    }

    public function printQuarterGenReport()
    {
        $param['locations'] = \App\Location::where('status',1)->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return view('locations.printquarterreportGen', $param);
    }

    public function printYearGenReport()
    {
        $param['locations'] = \App\Location::where('status',1)->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return view('locations.printyearreportGen', $param);
    }
    
     public function printJantoMarchReport()
    {
        $param['locations'] = \App\Location::where('status',1)->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return view('locations.printJantoMarch', $param);
    }
    
    public function printApriltoJuneReport()
    {
        $param['locations'] = \App\Location::where('status',1)->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return view('locations.printApriltoJune', $param);
    }
    
    public function printJulytoSeptemberReport()
    {
        $param['locations'] = \App\Location::where('status',1)->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return view('locations.printJulytoSeptember', $param);
    }
    
    public function printOctobertoDecemberReport()
    {
        $param['locations'] = \App\Location::where('status',1)->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return view('locations.printOctobertoDecember', $param);
    }
    
    public function getLocationReport($id)
    {
        $id = \Crypt::decrypt($id);
        $param['location'] = \App\Location::where('id', $id)->get();
        $param['wReports'] = \App\WeeklyReport::where('location_id',$id)->orderBy('created_at', 'desc','year' ,'desc', 'desc','week' ,'desc', 'week', 'desc', 'service_id', 'desc')->get();
        $param['pageName'] = \Auth::user()->location->loc_name ." All Weekly Reports";
        $sdate = 2015; //Start Year = defined year (1981)
        $edate = date("Y"); //End Year = Current Year
        $years = range ($sdate,$edate);
        $param['years'] = $years;
        $param['serviceTypes'] = \App\ServiceType::where('priority', 1)->get();
        $param['reports'] = \App\WeeklyReport::latest()->first();
        $param['pastors'] = \App\Pastor::where('location_id', \Auth::user()->location_id)->get();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }
        return view('locations.myReports', $param);
    }

    public function editeeklyReport()
    {   
        $inps = Input::all();
        // dd($inps);
        $weekrep = \App\WeeklyReport::find($inps['id']);
        $weekrep->location_id = \Auth::user()->location_id;
        $weekrep->service_type_id = $inps['svctype'];
        $weekrep->service_id = $inps['svc'];
        $weekrep->service_date = $inps['serviceDate'];
        $weekrep->week = $inps['week'];
        $year = new \DateTime($inps['serviceDate']);
        $month = new \DateTime($inps['serviceDate']);

        $weekrep->year = $year->format('Y');
        $weekrep->month = $month->format('m');
        $weekrep->attendance_male = $inps['male'];
        $weekrep->attendance_female = $inps['female'];
        $weekrep->attendance_children = $inps['children'];
        $weekrep->offering_cash = $inps['offering_cash'];
        $weekrep->offering_pos = $inps['offering_pos'];
        $weekrep->offering_cheque = $inps['offering_transfer'];
        // $weekrep->offering_amount = $inps['offerings'];
        $weekrep->tithe_cash = $inps['tithes_cash'];
        $weekrep->tithe_pos = $inps['tithes_pos'];
        $weekrep->tithe_cheque = $inps['tithes_transfer'];
        // $weekrep->tithe_amount = $inps['tithes'];
        $weekrep->new_converts = $inps['newconverts'];
        $weekrep->first_timers = $inps['firsttimers'];
        $weekrep->message_title = $inps['messagetitle'];
            if(!$inps['preacher'] == 909090909) {
                $weekrep->preacher = $inps['preacher'];
                $weekrep->preacher_other_name = null;
                $weekrep->preacher_other_ministry = null;
            } else {
                $weekrep->preacher = $inps['preacher'];
                $weekrep->preacher_other_name = $inps['preacher_other_name'];
                $weekrep->preacher_other_ministry = $inps['preacher_other_ministry'];
            }
        $weekrep->submited_by = \Auth::user()->id;
        $weekrep->status = 1;
        $weekrep->update();

        $weekrepE = new \App\WeeklyReportEdited;
        $weekrepE->location_id  = \Auth::user()->location_id;
        $weekrepE->weekly_report_id  = $inps['id'];
        $weekrepE->reason = $inps['reason'];
        $weekrepE->posted_by = \Auth::user()->id;
        $weekrepE->status = 1;
        
        $weekrepE->save();
        return redirect()->back();

    }
    
    public function plantingInfo()
    {
        $param['pageName'] = "Locations Planting Info";
        $param['locations'] = \App\Location::where('id', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return view('locations.plantinginfo', $param);
    }

    public function printPlantingInfo()
    {
        $param['pageName'] = "Locations Planting Info";
        $param['locations'] = \App\Location::where('id', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return view('locations.printplantinginfo', $param);
    }
    
    public function enableLogin()
    {
        $data = Input::all();
        $userExists = \App\User::whereEmail(Input::get('email'))->exists();
        if ($userExists) {
               flash()->success('This email '.$data['email'].' already exists for a user in the database');
               return back();
        } else {
            
        $nU = new \App\User;
        $nU->first_name = $data['sname'];
        $nU->last_name = $data['onames'];
        $nU->username = $data['sname'];
        $nU->email = $data['email'];
        $nU->phone_no = $data['phoneno'];
        $nU->location_id = $data['location_id'];
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
        // $nU->syncPermissions($data['permission_id']);
        $password = implode($pass);
        $optCode = $nU->optCode;
        $names = $data['sname']. ' '.$data['onames'];
        \Mail::to($data['email'])->send(new ActivationMail($data['email'],$password, $optCode, $names));
        SystemLog('System User', 'New User Data', \Auth::user()->first_name. ' added '.$nU->first_name."'s data to the system", $_SERVER['REMOTE_ADDR']);
       
        $uname = "GESUMAYOR";
        $pwd = "nanoplus85";
        $msg = "You have been enrolled on the Church A-2-Z platform of Dunamis International Gospel Center. Your details are as follows: email: " . $data['email']. " one time OTP Code is " . $optCode ." Your Password: ". $password ." It is valid for 120 minutes. Make sure you log in and update your account details on https://test.a2z.church . Thank you";
        // $msg = "Congrat! Your user account has been setup on the Dunamis Information eMembers Management System. Your credentials are as follows: Username: " .$data['email']. " Password: ".$pass." Your OneTimePassword to activate this account is ". $optCode." Thank You.";
        // $sender = "DunamisHQ";
        // $recipient = $data['phoneno'];
        // $sms_url = 'https://netbulksms.com/index.php?option=com_spc&comm=spc_api&username=GESUMAYOR&password=nanoplus85&sender=DunamisHQ&recipient=' . $recipient . '&message=' . urlencode($msg);
        // $sms = file_get_contents($sms_url);

        return redirect()->back()->with('message', 'Added '.$nU->surname.' '.$nU->othernames.' to the system users');
        }
    }


}
