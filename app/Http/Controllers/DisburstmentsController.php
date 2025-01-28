<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use App\AccountReconciliation;

class DisburstmentsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    public function recurrent()
    {
    	$locations = Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();

    	return view('accounts.reconsilations.recurrent', compact('locations'));
    }

    public function location()
    {
    	$locations = Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->simplePaginate(20);

    	return view('accounts.reconsilations.location-project', compact('locations'));
    }

    public function updateLocation(Request $request)
    {
        // dd($request->data[0]['ta']);
        // dd($request->data[0]['location_id']);
        foreach ($request->data as $requestdata) {

            $loc_id = $requestdata['loc_id'];

            $check = AccountReconciliation::where('location_id', $loc_id)->where('month_in_view', date('m'))->first();

            if ($check) {
                $check->travel_allowance      =       $requestdata['ta'];
                $check->packing_allowance     =       $requestdata['pa'];
                $check->marriage_support      =       $requestdata['ms'];
                $check->bereavement_support    =       $requestdata['bs'];

                $check->save();
            }
        
        }  

        return response("ok",200);
    }
}
