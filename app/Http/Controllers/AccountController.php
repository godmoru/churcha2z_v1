<?php

/*
Project: Membership/Information Management Software - Dunamis International Gospel Center, Abuja
File Name: Converts Controller 
Description: Core converts management functionalities controller.
Author: Umoru Godfrey, E. 
Address: GESUSOFT Technology, Abuja Nigeria
godfrey.umoru@gesusoft.com
Date Created: 20th May, 2019.
*/


namespace App\Http\Controllers;

ini_set('max_execution_time', 3000);
ini_set('memory_limit', '-1');

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Exports\IncomeReportExport;
use App\Exports\LocationIncomeReport;
use App\Exports\{AllLocationMonthlyIncomeReport,AllLocationMonthlyRegularIncomeReport,
    AllLocationMonthlyDistributionReport,AllLocationHQDistributionReport,LocationFinancialSummaryReport};
use App\AccountReconciliation;
use Excel;
use Carbon\Carbon;
use DateTime;
use App\Services\Account\LocationSummary;

class AccountController extends Controller
{
    protected $location;
	public function __construct(LocationSummary $location)
	{
        $this->middleware('auth');
        $this->location = $location;
	}

	public function dashboard()
	{
    	$param['pageName'] = "Accounts Dashboard";
    	$param['expTypes'] = \App\ExpenditureType::all();
        $param['expCats'] = \App\ExpenditureCategory::all();
    	$param['assetCats'] = \App\AssetCategory::all();
        $param['assetTypes'] = \App\AssetType::all();
        $param['incomeSource'] = \App\IncomeReportSource::all();

        
		return view('accounts.dashboard', $param);
	}
	
	public function onelocationx($id)
    {
        $id = \Crypt::decrypt($id);
        $param['location'] = \App\Location::find($id);
        $param['reports'] = \App\IncomeReport::where('location_id', $param['location']->id);  
        $param['months'] = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
            ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER"];
        $param['pageName'] = $param['location']->loc_name. " Financial Report";
        $param['iRSource'] = \App\IncomeReportSource::all();
        $param['capexp'] = \App\ExpenditureType::where('expenditure_category_id', 1)->get();
        $param['recexp'] = \App\ExpenditureType::where('expenditure_category_id', 2)->get();
        return view('accounts.onelocation', $param);
    }
    
    public function locationsgeneral(){
        $sData = Input::all();
        $param['months'] = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
            ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER"];
        $param['date'] = $date = (!empty($sData['month']) && !empty($sData['year'])) ? $param['months'][$sData['month']].', '.$sData['year'] : date('F, Y');
        $param['year'] = !empty($sData['year']) ? $sData['year'] : date('Y'); //Desired Year
        $param['month'] = !empty($sData['month']) ? $sData['month'] : date('m');
        $param['years'] = range(2015, date('Y'));
        $param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return view('accounts.income.locationsgeneral', $param);
    }

    public function exportlocationsgeneral(){
        $sData = Input::all();
        $param['months'] = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
            ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER"];
        $date = (!empty($sData['month']) && !empty($sData['year'])) ? $param['months'][$sData['month']].', '.$sData['year'] : date('F, Y');
        $param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return Excel::download(new LocationFinancialSummaryReport($locations, $sData['year'], $sData['month']), 'LocationsFinancialSummary-'.$date.'.xlsx');
    }
    
    public function printlocationsgeneral(){
        $param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return view('accounts.printlocationfinsummary', $param);
    }
    
	public function submitIncomeReport()
    {       

    	$inps = Input::all();
    	if($inps['svctype'] == 999) {
            $service_type_id = $inps['svctype'];
            $datefrom = $inps['datefrom'];
            $dateto = $inps['dateto'];
            $service_type_other_name = $inps['service_type_other'];
            $service_date = null;
        } else {
            $service_type_id = $inps['svctype'];
            $service_type_other_name = null;
            $datefrom = null;
            $dateto = null;
            $service_date = $inps['service_date'];
        }

        // dd($datefrom);
        foreach ($inps['iSourceId'] as $key => $v)
         {       
        	$iData =[
                'location_id'  => \Auth::user()->location_id,
                'submitted_by' => \Auth::user()->id,
                'year' => date("Y"),
                'month' => date("m"),
                'income_report_source_id' => $v,
                'service_type_id' => $service_type_id,
                'date_from' => $datefrom,
                'date_to' => $dateto,
                'service_type_other_name' => $service_type_other_name,
                'service_date' => $service_date,
                'cash' => $inps['cash'][$key],
                'pos' => $inps['pos'][$key],
                'cheques' => $inps['cheques'][$key],
                'status' => 1,
            ];
            \App\IncomeReport::insert($iData);
        }

        flash()->success('You have successfully submited this income, thank you.');
        return redirect()->back();
    }

    public function incomesummary($type)
    {
        $sData = Input::all();
        $param = $this->location->getSingelocationSummary($sData, $type);
    	return view('accounts.income.locationincomesummary', $param);
    }

    public function monthincomesummary()
    {
        $param['pageName'] = " Month Income Summary";
        $param['incomeSource'] = \App\IncomeReportSource::all();
        // $param['years'] = range (2015,date("Y"));;
        return view('accounts.income.locationmonthlyincomesummary', $param);
    }

    public function monthincomesummary2($type)
    {
        $sData = Input::all();
        $param = $this->location->getlocationsSummary($sData, $type);
        return view('accounts.income.locationmonthlyincomesummary2', $param);
    }

    public function exportmonthincomesummary2($type) 
    {
        try {
            $sData = Input::all();
            $param['months'] = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
            ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER", 13 => "All"];
            $locations = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
            $date = (!empty($sData['month']) && !empty($sData['year'])) ? $param['months'][$sData['month']].', '.$sData['year'] : date('F, Y');
            if($type == 'income_summary')
            {
                return Excel::download(new AllLocationMonthlyIncomeReport($locations, $sData['year'], $sData['month']), 'LocationsIncomeSummary-'.$date.'.xlsx');
            }else if($type == 'location_income') 
            {
                return Excel::download(new AllLocationMonthlyRegularIncomeReport($locations, $sData), 'LocationsIncome-'.$date.'.xlsx');
            }else if($type == 'location_distribution')
            {
                return Excel::download(new AllLocationMonthlyDistributionReport($locations, $sData), 'LocationsIncomeHQDistribution-'.$date.'.xlsx');
            }else if($type == "location_hq_distribution") {
                return Excel::download(new AllLocationHQDistributionReport($locations, $sData), 'LocationsHQDistribution-'.$date.'.xlsx');
            }
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function printmonthincomesummary()
    {
        $param['pageName'] = " Monthly Income Summary";
        $param['incomeSource'] = \App\IncomeReportSource::all();
        $param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return view('accounts.income.prints.locationsmonthincome', $param);
    }

    public function incomestatement()
    {
    	$param['pageName'] = "Income";
        $param['incomeSource'] = \App\IncomeReportSource::all();
        $param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
    	return view('accounts.income.statement', $param);
    }

    public function cummulativesummary()
    {
    	$param['pageName'] = "Income";
        $param['incomeSource'] = \App\IncomeReportSource::all();
        $param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        $sdate = 2015; //Start Year = defined year (1981)
        $edate = date("Y"); //End Year = Current Year
        $years = range ($sdate,$edate);
        $param['years'] = $years;
    	return view('accounts.income.locationcummulativesummary', $param);
    }

    public function cummulativeYearssummary()
    {
    	$param['pageName'] = "Five Years Income";
        $param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        $sdate = (int) date("Y") - 5; //Start Year = defined year (1981)
        $edate = date("Y"); //End Year = Current Year
        $years = range ($sdate,$edate);
        $param['years'] = $years;
    	return view('accounts.income.yearssummary', $param);
    }

    public function exportgetYcummulativesummary() 
    {
        try {
            $sData = Input::all();
            $location = \App\Location::find($sData['location']);
            return Excel::download(new LocationIncomeReport($location, $sData['year']), $location->loc_name.'-'.$sData['year'].'.xlsx');
        } catch (\Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function getYcummulativesummary()
    {
        $sData = Input::all();
        $month = '-'.(int) date('m') + '1'.'months';
        $dt = \Carbon\Carbon::create($sData['year']);
        $dt->firstOfMonth();
        $dt->modify($month);
    	$param['pageName'] = "Income";
        $param['incomeSource'] = \App\IncomeReportSource::all();
        if($sData['location'] == 9999){
        	$param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        	$sdate = 2015; //Start Year = defined year (1981)
        	$param['year'] = $sData['year']; //Desired Year
            // $param['q_year'] = $dt;
        	$edate = date("Y"); //End Year = Current Year
	        $years = range($sdate,$edate);
	        $param['years'] = $years;
	    	return view('accounts.income.locationcummulativesummary2', $param);
        }
        else{
        	$param['location'] = \App\Location::find($sData['location']);
        	$param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        	$sdate = 2015; //Start Year = defined year (1981)
            $param['year'] = $sData['year']; //Desired Year
            $param['q_year'] = $dt;
        	$edate = date("Y"); //End Year = Current Year
	        $years = range($sdate,$edate);
	        $param['years'] = $years;
	    	return view('accounts.income.locationyearsummary', $param);
        }
        
    }

    public function getMcummulativesummary()
    {
        $sData = Input::all();
    	$param['pageName'] = "Income Summary";
        $param['incomeSource'] = \App\IncomeReportSource::all();
        $param['reports'] = \App\IncomeReport::where('location_id', $sData['location']);
        if($sData['location'] == 9999){
            $param['years'] = range(2015,date("Y"));
            $param['months'] = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
            ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER", 13 => "All"];
            $param['date'] = (!empty($sData['month']) && !empty($sData['year'])) ? $param['months'][$sData['month']].', '.$sData['year'] : date('F, Y');
            $param['month'] = !empty($sData['month']) ? $sData['month'] : (int) date('m');
            $param['year'] = !empty($sData['year']) ? $sData['year'] : date("Y");
            $param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
	    	return view('accounts.income.locationmonthlyincomesummary2', $param);
        }
        else{
        	$param['location'] = \App\Location::find($sData['location']);
        	$param['reports'] = \App\IncomeReport::where('location_id', $sData['location'])->where('month', $sData['month'])->where('year', $sData['year'])->get();
        	$param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        	$param['year'] = $sData['year']; //Desired Year
        	$param['month'] = $sData['month']; //Desired Month 
	        $param['years'] = range(2015,date("Y"));
	    	return view('accounts.income.locationmonthsummary', $param);
        }
        
    }

    public function getmyMonthIncomeSummary()
    {
        $sData = Input::all();
        $yr = (!empty($sData['year'])) ? $sData['year'] : \Carbon\Carbon::now()->format('Y');
        $mt = (!empty($sData['month'])) ? $sData['month'] : \Carbon\Carbon::now()->format('m');
        $param['location'] = \App\Location::find(\Auth::user()->location_id);
        $param['reports'] = $reports = \App\IncomeReport::where('location_id', \Auth::user()->location_id)->where('month', $mt)->where('year', $yr)->get();
        $param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        $param['months'] = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
        ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER"];
        $param['month'] = !empty($sData['month']) ? $sData['month'] : (int) date('m');
        $param['date'] = (!empty($sData['month']) && !empty($sData['year'])) ? $param['months'][$sData['month']].', '.$sData['year'] : date(' F, Y');
        $param['year'] = !empty($sData['year']) ? $sData['year'] : date("Y");
        $param['years'] = range(2015,date("Y"));
        return view('accounts.income.mylocationmonthlysummary', $param);
    }

    public function getmyDailyIncomeSummary()
    {
        $sData = Input::all();
        $dt = (!empty($sData['month']) && !empty($sData['year']) && !empty($sData['day'])) ? \Carbon\Carbon::createFromDate($sData['year'],$sData['month'],$sData['day']): \Carbon\Carbon::today();
        $yr = (!empty($sData['year'])) ? $sData['year'] : \Carbon\Carbon::now()->format('Y');
        $mt = (!empty($sData['month'])) ? $sData['month'] : \Carbon\Carbon::now()->format('m');
        $param['location'] = \App\Location::find(\Auth::user()->location_id);
        $param['sources'] = \App\IncomeReportSource::all();
        $param['reports'] = \App\IncomeReport::where('location_id', \Auth::user()->location_id)->where('month', $mt)->where('year', $yr)->whereDate('created_at', $dt)->get();
        $param['months'] = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
        ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER"];
        $param['date'] = (!empty($sData['month']) && !empty($sData['year']) && !empty($sData['day'])) ? $sData['day'].' '.$param['months'][$sData['month']].', '.$sData['year'] : date('jS F, Y');
        $param['dt'] = $dt;
        $param['month'] = !empty($sData['month']) ? $sData['month'] : (int) date('m');
        $param['year'] = !empty($sData['year']) ? $sData['year'] : date("Y");
        $param['years'] = range(2015,date("Y"));
        $param['days'] = range(1,31);
        return view('accounts.income.mylocationdailyincomesummary', $param);
    }


    public function downloadthismonth($type)
    {
    	return \Excel::download(new IncomeReportExport, 'income_statements.xlsx');

    	// $data = User::get()->toArray();
    		// $data = \App\IncomeReport::select('id', 'service_date', 'year', 'month', 'cash', 'pos', 'cheques')->whereDate('created_at', \Carbon\Carbon::today())->get()->toArray();
		        // return \Excel::create('income statement', function($excel) use ($data) {
		        //     $excel->sheet('mySheet', function($sheet) use ($data)
		        //     {
		        //         $sheet->cell('A1', function($cell) {$cell->setValue('ID');   });
		        //         $sheet->cell('B1', function($cell) {$cell->setValue('Service Date');   });
		        //         $sheet->cell('C1', function($cell) {$cell->setValue('Year');   });
		        //         $sheet->cell('D1', function($cell) {$cell->setValue('Month');   });
		        //         $sheet->cell('E1', function($cell) {$cell->setValue('Cash');   });
		        //         $sheet->cell('F1', function($cell) {$cell->setValue('POS/Transfer/Online');   });
		        //         $sheet->cell('G1', function($cell) {$cell->setValue('Cheques');   });
		        //         if (!empty($data)) {
		        //             foreach ($data as $key => $value) {
		        //                 $i= $key+2;
		        //                 $sheet->cell('A'.$i, $value['id']); 
		        //                 $sheet->cell('B'.$i, $value['service_date']); 
		        //                 $sheet->cell('C'.$i, $value['year']); 
		        //                 $sheet->cell('D'.$i, $value['month']); 
		        //                 $sheet->cell('E'.$i, $value['cash']); 
		        //                 $sheet->cell('F'.$i, $value['pos']); 
		        //                 $sheet->cell('G'.$i, $value['cheques']); 
		        //             }
		        //         }
		        //     });
		        // })->download($type);
    
    }



    public function expenditureCats()
    {
    	$param['pageName'] = "Expenditure Categories";
        $param['expCats'] = \App\ExpenditureCategory::all();
    	return view('accounts.expenditures.categoryindex', $param);
    }

    public function expenditureTypes()
    {
    	$param['pageName'] = "Expenditure Types";
        $param['expTypes'] = \App\ExpenditureType::all();
        $param['expCats'] = \App\ExpenditureCategory::all();
    	return view('accounts.expenditures.typeindex', $param);
    }

    public function newExpType()
    {
    	$inps = Input::all();

    	$nType = new \App\ExpenditureType;
    	$nType->name = $inps['name'];
    	$nType->expenditure_category_id = $inps['category'];
    	$nType->description = $inps['description'];
    	$nType->created_by = \Auth::user()->id;
    	$nType->status = 1;
    	$nType->save();

        flash()->success('You have successfully created '.$inps['name']. ' to the expenditure types on the system');
        return redirect()->back();

    }

    public function loccapex()
    {
    	$param['pageName'] = "Capital Expenditures By Locations";
        $param['expTypes'] = \App\ExpenditureType::where('expenditure_category_id', 1)->get();
        $param['locations'] = \App\Location::where('status', 1)->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
    	return view('accounts.expenditures.locationexpenditureindex', $param);
    }
    
    public function printloccapex()
    {
    	$param['pageName'] = "Capital Expenditures By Locations";
        $param['expTypes'] = \App\ExpenditureType::where('expenditure_category_id', 1)->get();
        $param['locations'] = \App\Location::where('status', 1)->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
    	return view('accounts.expenditures.printlocationexpenditureindex', $param);
    }
    

    public function locrecurrentex()
    {
    	$param['pageName'] = "Recurrent Expenditures By Locations";
        $param['expTypes'] = \App\ExpenditureType::where('expenditure_category_id', 2)->get();
        $param['locations'] = \App\Location::where('status', 1)->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
    	return view('accounts.expenditures.locrecurrentex', $param);
    }

    public function recurrentexp()
    {
    	$param['pageName'] = "Recurrent Expenditures";
        $param['expTypes'] = \App\ExpenditureType::where('expenditure_category_id', 2)->get();
        $years = range (date("Y") - 5,date("Y"));
        $param['years'] = $years;
    	return view('accounts.expenditures.recurrentexp', $param);
    }
    public function capexp()
    {
    	$param['pageName'] = "Capital Expenditure";
        $param['expTypes'] = \App\ExpenditureType::where('expenditure_category_id', 1)->get();
        $years = range (date("Y") - 5,date("Y"));
        $param['years'] = $years;
    	return view('accounts.expenditures.capex', $param);
    }

    public function locmonthlycapexp()
    {
        $param['pageName'] = "Month Capital Expenditure";
        $param['expTypes'] = \App\ExpenditureType::where('expenditure_category_id', 1)->get();
        return view('accounts.expenditures.locationcapex2', $param);
    }

    public function locmonthlyrecurrentexp()
    {
        $param['pageName'] = "Month Recurrent Expenditure";
        $param['expTypes'] = \App\ExpenditureType::where('expenditure_category_id', 2)->get();
        $param['location'] = \App\Location::where('status', '!=', '')->where('id', \Auth::user()->location_id)->first();

        $param['months'] = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        
        return view('accounts.expenditures.locationmonthrecurrentexpenditure2', $param);
    }
    
   public function printYearExp()
    {
        $param['pageName'] = date("Y") ." Expenditures Summary";
        $param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return view('accounts.expenditures.printyearexpenditure', $param);
    }


    public function submitExpenditure()
    {
    	$inps = Input::all();
        foreach ($inps['typeId'] as $key => $v)
         {       
            $expData = [
                 
		                 	'location_id'  => \Auth::user()->location_id,
		                 	'submitted_by' => \Auth::user()->id,
		                 	'year' => \Carbon\Carbon::parse($inps['report_date'])->format("Y"),
		                 	'month' => \Carbon\Carbon::parse($inps['report_date'])->format("m"),
		                 	'expenditure_type_id' => $v,
		                 	'expenditure_category_id' => is_array($inps['cap_id']) ? $inps['cap_id'][$key] : $inps['cap_id'],
		                 	'amount' => $inps['amount'][$key],
		                 	'status' => 1,
		                ];
                \App\LocationExpenditure::insert($expData);
        }

        flash()->success('You have successfully submited this months expenditure, thank you.');
        return redirect()->back();
    }
    
    public function submitUncatExpenditure(Request $request)
    {

        $inps = Input::all();
        $request->validate([
            'addmore.*.expenditure_type_other_name' => 'required',
            'addmore.*.amount' => 'required',
            // 'year' => \Carbon\Carbon::parse($request->report_date->format("Y"),
            // 'month' => \Carbon\Carbon::parse($request->report_date->format("m"),
        ]);

            foreach ($request->addmore as $key => $v) {
                \App\LocationExpenditure::insert($v);
             }
             
        flash()->success('You have successfully submited this months expenditure, thank you.');
        return redirect()->back();
    }

    public function viewExpenditures($id)
    {
    	$id = \Crypt::decrypt($id);
        $param['location'] = \App\Location::find($id);
    	$param['pageName'] = $param['location']->loc_name. " Expenditures";
    	return view('accounts.expenditures.expenditureprofile', $param);
    }

    public function cummulativeYearExp($id)
    {
        $type = 0;
        if($id == "capital"){
            $type = 1;
        }else{
            $type = 2;
        }
    	$param['pageName'] = "Five Years Expenditure";
        $param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        $years = range (date('Y') - 5, date('Y'));
        $param['years'] = $years;
        $param['type'] = $type;
    	return view('accounts.expenditures.yearexpenditure', $param);
    }


    public function  newWklIncome()
    {
        $param['pageName'] = \Auth::user()->location->loc_name ." Income Submission";
        $sdate = 2015; //Start Year = defined year (1981)
        $edate = date("Y"); //End Year = Current Year
        $years = range ($sdate,$edate);
        $param['years'] = $years;
        $param['serviceTypes'] = \App\ServiceType::where('priority', 1)->get();
        $param['sources'] = \App\IncomeReportSource::all();
        $param['pastors'] = \App\Pastor::where('location_id', \Auth::user()->location_id)->get();
                $param['reports'] = \App\WeeklyReport::latest()->first();
        if (\Auth::user()->location_id == 1) {
            $param['services'] = \App\Service::all()->take(4);
        } else {
            $param['services'] = \App\Service::all();
        }
        return view('locations.submitweeklyincome', $param);
    }

    public function  balanceSheet()
    {
        $sData = Input::all();
        $dt = (!empty($sData['month']) && !empty($sData['year']) && !empty($sData['day'])) ? \Carbon\Carbon::createFromDate($sData['year'],$sData['month'],$sData['day']): \Carbon\Carbon::today();
        $yr = (!empty($sData['year'])) ? $sData['year'] : \Carbon\Carbon::now()->format('Y');
        $mt = (!empty($sData['month'])) ? $sData['month'] : \Carbon\Carbon::now()->format('m');
        $param['location'] = \App\Location::find(\Auth::user()->location_id);
        $param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        $param['reports'] = \App\IncomeReport::where('location_id', \Auth::user()->location_id)->where('month', $mt)->where('year', $yr)->whereDate('created_at', $dt)->get();
        $param['months'] = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
        ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER"];
        $param['date'] = (!empty($sData['month']) && !empty($sData['year']) && !empty($sData['day'])) ? $sData['day'].' '.$param['months'][$sData['month']].', '.$sData['year'] : date('jS F, Y');
        $param['dt'] = $dt;
        $param['month'] = !empty($sData['month']) ? $sData['month'] : (int) date('m');
        $param['year'] = !empty($sData['year']) ? $sData['year'] : date("Y");
        $param['years'] = range(2015,date("Y"));
        $param['days'] = range(1,31);
        return view('accounts.income.locationbalancesheet', $param);
    }
    
    public function editLociReport()
    {
        $inps = Input::all();
        // dd($inps);
        $iRep = \App\IncomeReport::find($inps['id']);
        $iRep->location_id = $iRep->location_id;
        
        $iRep->cash = $inps['cash'];
        $iRep->pos = $inps['pos'];
        $iRep->cheques = $inps['cheques'];
        $iRep->status = 1;
        $iRep->update();

        $iRepE = new \App\IncomeReportEdited;
        $iRepE->location_id  = $iRep->location_id;
        $iRepE->income_report_id  = $inps['id'];
        $iRepE->reason = $inps['reason'];
        $iRepE->posted_by = \Auth::user()->id;
        $iRepE->status = 1;
        $iRepE->save();
        flash()->success('Income Data has successfully been updated, thank you.');
        SystemLog('Income Report', 'Income Data', \Auth::user()->first_name. ' '.\Auth::user()->last_name.' edited income data with  id: '.$inps['id'] .' from '.$iRep->loc->loc_name .' submitted on the '. $iRep->created_at.' on the server', $_SERVER['REMOTE_ADDR']);
        return redirect()->back();
    }

    public function deleteLociReport()
    {
        $inps = Input::all();
        $iRep = \App\IncomeReport::find($inps['id']); //Find the selected row from the database and delete it.

        $iRepD = new \App\IncomeReportDeleted;
        $iRepD->location_id  = $iRep->location_id;
        $iRepD->income_report_id  = $inps['id'];
        $iRepD->cash = $iRep->cash;
        $iRepD->pos = $iRep->pos;
        $iRepD->cheques = $iRep->cheques;
        $iRepD->service_type_id = $iRep->service_type_id;
        $iRepD->service_date = $iRep->service_date;
        $iRepD->date_from = $iRep->date_from;
        $iRepD->date_to = $iRep->date_to;
        $iRepD->month = $iRep->month;
        $iRepD->year = $iRep->year;
        $iRepD->income_report_status = $iRep->status;
        $iRepD->submitted_by = $iRep->submitted_by;
        $iRepD->reason = $inps['reason'];
        $iRepD->posted_by = \Auth::user()->id;
        $iRepD->status = 1;
        $iRepD->save();

        $iRep->delete(); 
        flash()->warning('Income Data has successfully been deleted from the locations, thank you.');
        SystemLog('Income Report', 'Income Data', \Auth::user()->first_name. ' '.\Auth::user()->last_name.' deleted income data with  id: '.$inps['id'] .' from '.$iRep->loc->loc_name .' submitted on the '. $iRep->created_at.' on the server', $_SERVER['REMOTE_ADDR']);
        return back();
    }

    public function assetcat()
    {
    	$param['pageName'] = "Asset Categories";
        $param['assetCats'] = \App\AssetCategory::all();
    	return view('accounts.assetmanagement.categoryindex', $param);
    }

    public function newcat()
    {
    	$inps = Input::all();
    	$aCat = new \App\AssetCategory;
    	$aCat->name = $inps['name'];
    	$aCat->description = $inps['description'];
    	$aCat->created_by = \Auth::user()->id;
    	$aCat->status = 1;
    	$aCat->save();

        flash()->success('You have successfully created '.$inps['name']. ' to the asset types on the system');
        return redirect()->back();	
    }

    public function viewcat($id)
    {
    	# code...
    }

    public function editCat()
    {
    	# code...
    }

    public function deletecat($id)
    {
    	# code...
    }



    public function assetTypes()
    {
    	$param['pageName'] = "Asset Types";
        $param['assetTypes'] = \App\AssetType::all();
        $param['assetCats'] = \App\AssetCategory::all();
    	return view('accounts.assetmanagement.typeindex', $param);
    }

    public function newType ()
    {
    	$inps = Input::all();
    	$aType = new \App\AssetType;
    	$aType->name = $inps['name'];
    	$aType->asset_category_id = $inps['category'];
    	$aType->description = $inps['description'];
    	$aType->created_by = \Auth::user()->id;
    	$aType->status = 1;
    	$aType->save();

        flash()->success('You have successfully created '.$inps['name']. ' to the asset types on the system');
        return redirect()->back();
    }

    public function viewType($id)
    {
    	# code...
    }

    public function editType()
    {
    	# code...
    }

    public function deleteType($id)
    {
    	# code...
    }

    

    public function assets()
    {	
    	$location = \App\Location::find(\Auth::user()->location_id);
    	$param['pageName'] = "Locations Assets";
        $param['assetTypes'] = \App\AssetType::all();
        $param['assetCats'] = \App\AssetCategory::all();
        $param['assets'] = \App\Asset::all();
    	return view('accounts.assetmanagement.assetindex', $param);
    }

    public function assetDelete($id)
    {	
    	\App\Asset::find($id)->delete();
        flash()->success('You have successfully deleted an asset on the system');
        return redirect()->back();
    }

    public function locassets()
    {   
        $location = \App\Location::find(\Auth::user()->location_id);
        $param['pageName'] = $location->loc_name. " Assets";
        $param['assetTypes'] = \App\AssetType::all();
        $param['assetCats'] = \App\AssetCategory::all();
        $param['assets'] = \App\Asset::where('location_id', \Auth::user()->location_id)->get();
        return view('accounts.assetmanagement.locationassets', $param);
    }

    public function newAsset()
    {
    	$inps = Input::all();
    	// dd($inps);
    	$asset = new \App\Asset;
        $asset->name = $inps['name'];
    	$asset->location_id = \Auth::user()->location_id;
    	$asset->asset_type_id = $inps['atype'];
    	$asset->model = $inps['model'];
    	$asset->serial_no = $inps['serial'];
    	$asset->manufacturer = $inps['manufacturer'];
    	$asset->vendor = $inps['vendor'];
    	$asset->purchase_cost = $inps['cost'];
    	$asset->invoice_no = $inps['purchaseinvoice'];
    	$asset->current_status = $inps['status'];
    	$asset->description = $inps['description'];
    	$asset->submitted_by = \Auth::user()->id;
    	$asset->status = 1;
    	// dd($asset);
    	$asset->save();

        flash()->success('You have successfully created '.$inps['name']. ' to the asset list on the system');
        return redirect()->back();
    }

    public function viewAsset($id)
    {

    }

    public function editAsset()
    {
    	$inps = Input::all();
    	$asset = \App\Asset::find($inps['id']);
    	// dd($asset);
    	$asset->name = $inps['name'];
    	$asset->asset_type_id = $inps['atype'];
    	$asset->model = $inps['model'];
    	$asset->serial_no = $inps['serial'];
    	$asset->manufacturer = $inps['manufacturer'];
    	$asset->vendor = $inps['vendor'];
    	$asset->purchase_cost = $inps['cost'];
    	$asset->invoice_no = $inps['purchaseinvoice'];
    	$asset->current_status = $inps['status'];
    	$asset->description = $inps['description'];
    	$asset->submitted_by = \Auth::user()->id;
    	$asset->status = 1;
    	// dd($asset);
    	$asset->save();

        flash()->success('You have successfully created '.$inps['name']. ' to the asset list on the system');
        return redirect()->back();
    }

    public function deleteAsset($id)
    {
    	# code...
    }
    
    public function accountreconcile()
    {
        $param['locations'] = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        return view('accounts.reconcile.index', $param);
    }

    public function doaccountreconcile()
    {
        $inps = Input::all();

        $acctR = new \App\AccountReconciliation;
        $acctR->location_id = $inps['locationId'];

        $acctR->month_in_view = \Carbon\Carbon::parse($inps['dateinfo'])->format("m");
        $acctR->year_in_view = \Carbon\Carbon::parse($inps['dateinfo'])->format("Y");
        $acctR->previous_month_in_view = \Carbon\Carbon::parse($inps['dateinfo'])->format("m")-1;

        if ($inps['lastBalancer']==0) {
            $acctR->previous_month_total = 0.00;
        } else {
            $acctR->previous_month_total = $inps['lastBalancer'];
        }
        
        // $acctR->previous_month_total = $inps['lastBalancer'];
        $acctR->amount_in_bank  = $inps['btotal'] ;
        $acctR->variance_amount = $inps['differencer'];
        $acctR->tithe_amount = $inps['tither'];
        $acctR->kingdom_practice = $inps['kpr'];
        $acctR->salaries = $inps['salariesr'];
        $acctR->mission = $inps['missionr'];
        $acctR->reserve = $inps['reservesr'];
        $acctR->recurrent = $inps['recurrentr'];
        $acctR->housing = $inps['housingr'];
        $acctR->location_projects = $inps['locPr'];
        $acctR->travel_allowance = $inps['travel'];
        $acctR->packing_allowance = $inps['packing'];
        $acctR->marriage_support = $inps['msupport'];
        $acctR->bereavement_support = $inps['bereavement'];
        $acctR->submitted_by = \Auth::user()->id;
        $acctR->status = 1;

        $acctR->save();

        return back();
    }
    
    
        // accounts reconsilation 'get' controller
    public function accountReconsilation()
    {
        $locations = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->simplePaginate(20);

        return view('accounts.reconsilations.accounts-reconsilation', compact('locations'));
    }

    // accounts reconsilation 'post' controller
    public function SaveAccReconsilation(Request $request)
    {
        // dd($request->data[0]['location_id']);
        foreach ($request->data as $requestdata) {

            $loc_id =  $requestdata['location_id'];

            $check = AccountReconciliation::where('location_id', $loc_id)->where('month_in_view', date('m'))->first();

            if ($check) {
                $check->amount_in_bank      =       $requestdata['locationdata']['monthIncome'];
                $check->variance_amount     =       $requestdata['locationdata']['diff'];
                $check->tithe_amount        =       $requestdata['locationdata']['tight'];
                $check->kingdom_practice    =       $requestdata['locationdata']['kingdomPractice'];
                $check->salaries            =       $requestdata['locationdata']['salaries'];
                $check->mission             =       $requestdata['locationdata']['mission'];
                $check->reserve             =       $requestdata['locationdata']['reserves'];
                $check->recurrent           =       $requestdata['locationdata']['recurrent'];
                $check->housing             =       $requestdata['locationdata']['housing'];
                $check->location_projects   =       $requestdata['locationdata']['locationProject'];

                $check->save();

            }else{
                $AccRec = new AccountReconciliation();

                // dd($requestdata['locationdata']['salaries']);

                $AccRec->location_id                = $requestdata['location_id'];
                $AccRec->month_in_view              = date('m');
                $AccRec->year_in_view               = date('Y');
                $AccRec->previous_month_in_view     = (int)date('m') - 1;
                $AccRec->amount_in_bank             = $requestdata['locationdata']['monthIncome'];
                $AccRec->variance_amount            = $requestdata['locationdata']['diff'];
                $AccRec->tithe_amount               = $requestdata['locationdata']['tight'];
                $AccRec->kingdom_practice           = $requestdata['locationdata']['kingdomPractice'];
                $AccRec->salaries                   = $requestdata['locationdata']['salaries'];
                $AccRec->mission                    = $requestdata['locationdata']['mission'];
                $AccRec->reserve                    = $requestdata['locationdata']['reserves'];
                $AccRec->recurrent                  = $requestdata['locationdata']['recurrent'];
                $AccRec->housing                    = $requestdata['locationdata']['housing'];
                $AccRec->location_projects          = $requestdata['locationdata']['locationProject'];
                $AccRec->submitted_by               = Auth::user()->id;
                $AccRec->status                     = 0;

                $AccRec->save();

            }

        }

        return response('ok', 200);

    }

    public function hqRemitance()
    {
        $locations = \App\Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();

        return view('accounts.reconsilations.hq-remitance', compact('locations'));
    }

    public function hqRemitancePaid(Request $request)
    {
        HQRemitance::create(['month'=>date('m'),'paid'=>true]);

        return response("ok",200);
    }
    




}
