<?php

namespace App\Services;
use stdClass;
use App\{IncomeReport,IncomeReportSource, Disbursement, LocationExpenditure};

class AccountCollection {

    public function regularIncome($sData)
    {
        $year = !empty($sData['year']) ? $sData['year'] : (int) date('Y');
        $months = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
        ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER"];
        $range = range(!empty($sData['fmonth']) ? (int) $sData['fmonth'] : 1, !empty($sData['emonth']) ? (int) $sData['emonth'] : (int) date('m'));
        $bmonths = (!empty($sData['year']) && $year !== date('Y')) ? ((empty($sData['fmonth']) && empty($sData['emonth'])) ? 
        $months : array_intersect_key($months, array_flip($range))) : 
        array_intersect_key($months, array_flip($range));
        $collections = [];
        foreach($bmonths as $key => $month){
            $collections[] = (object) [
                'month' => $month,
                'total_income' => $this->getRegIncome($year, $key),
                'slpf' => $this->getByName($year, $key, 'Location Project Offering'),
                'cpif' => $this->getByName($year, $key, 'Capital Project Income from HQ (CPHQ)'),
                'shq' => $this->getByName($year, $key, 'Other Income - HQ Sacrifice'),
                'posp' => $this->getByName($year, $key, 'Dr Paul Special Offering'),
                'pomb' => $this->getByName($year, $key, 'Dr Mrs Becky Special Offering'),
                'rspt' => $this->getByName($year, $key, 'Resident Pastor Offering'),
                'total' => $this->getRegIncome($year, $key) + $this->getByName($year, $key, 'Location Project Offering') 
                + $this->getByName($year, $key, 'Capital Project Income from HQ (CPHQ)') + $this->getByName($year, $key, 'Other Income - HQ Sacrifice') +
                $this->getByName($year, $key, 'Dr Paul Special Offering') + $this->getByName($year, $key, 'Dr Mrs Becky Special Offering') 
                + $this->getByName($year, $key, 'Resident Pastor Offering'),
            ];
        }
        
        return collect($collections);
    }

    public function LocationregularIncome($sData, $locations)
    {
        $month = !empty($sData['month']) ? $sData['month'] : (int) date('m');
        $year = !empty($sData['year']) ? $sData['year'] : date("Y");
        $collections = [];
        foreach($locations as $key => $location){
            $collections[] = (object) [
                'branch' => $location->loc_name,
                'total_income' => $this->getRegIncome($year, $month, $location->id),
                'slpf' => $this->getByName($year, $month, 'Location Project Offering', $location->id),
                'cpif' => $this->getByName($year, $month, 'Capital Project Income from HQ (CPHQ)', $location->id),
                'shq' => $this->getByName($year, $month, 'Other Income - HQ Sacrifice', $location->id),
                'posp' => $this->getByName($year, $month, 'Dr Paul Special Offering', $location->id),
                'pomb' => $this->getByName($year, $month, 'Dr Mrs Becky Special Offering', $location->id),
                'rspt' => $this->getByName($year, $key, 'Resident Pastor Offering', $location->id),
                'total' => $this->getRegIncome($year, $month, $location->id) + $this->getByName($year, $month, 'Location Project Offering', $location->id) 
                + $this->getByName($year, $month, 'Capital Project Income from HQ (CPHQ)', $location->id) + $this->getByName($year, $month, 'Other Income - HQ Sacrifice', $location->id) +
                $this->getByName($year, $month, 'Dr Paul Special Offering', $location->id) + $this->getByName($year, $month, 'Dr Mrs Becky Special Offering', $location->id) 
                + $this->getByName($year, $key, 'Resident Pastor Offering', $location->id),
            ];
        }

        $collections[] = (object) [
            'branch' => "Grand Total",
            'total_income' => $this->getRegIncome($year, $month, "all"),
            'slpf' => $this->getByName($year, $month, 'Location Project Offering', "all"),
            'cpif' => $this->getByName($year, $month, 'Capital Project Income from HQ (CPHQ)', "all"),
            'shq' => $this->getByName($year, $month, 'Other Income - HQ Sacrifice', "all"),
            'posp' => $this->getByName($year, $month, 'Dr Paul Special Offering', "all"),
            'pomb' => $this->getByName($year, $month, 'Dr Mrs Becky Special Offering', "all"),
            'rspt' => $this->getByName($year, $key, 'Resident Pastor Offering', "all"),
            'total' => $this->getRegIncome($year, $month, "all") + $this->getByName($year, $month, 'Location Project Offering', "all") 
            + $this->getByName($year, $month, 'Capital Project Income from HQ (CPHQ)', "all") + $this->getByName($year, $month, 'Other Income - HQ Sacrifice', "all") +
            $this->getByName($year, $month, 'Dr Paul Special Offering', "all") + $this->getByName($year, $month, 'Dr Mrs Becky Special Offering', "all") 
            + $this->getByName($year, $key, 'Resident Pastor Offering', "all"),
        ];
        
        return collect($collections);
    }

    public function pastMonthIncome($sData)
    {
        $year = !empty($sData['year']) ? $sData['year'] : (int) date('Y');
        $months = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
        ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER"];
        $range = range(!empty($sData['fmonth']) ? (int) $sData['fmonth'] : 1, !empty($sData['emonth']) ? (int) $sData['emonth'] : (int) date('m'));
        $bmonths = (!empty($sData['year']) && $year !== date('Y')) ? ((empty($sData['fmonth']) && empty($sData['emonth'])) ? 
        $months : array_intersect_key($months, array_flip($range))) : 
        array_intersect_key($months, array_flip($range));
        $collections = [];
        foreach($bmonths as $key => $month){
            $collections[] = (object) [
                'month_key' => $key,
                'month' => $month,
                'total_income' => $this->getRegIncome($year, $key),
                'branch_income' => $this->getRegIncome($year, $key) * (55/100),
                'hq_income' => $this->getRegIncome($year, $key) * (45/100),
                'shq' => $this->getByName($year, $key, 'Other Income - HQ Sacrifice'),
            ];
        }
        
        return collect($collections);
    }

    public function LocationsMonthIncome($sData, $locations)
    {
        $month = !empty($sData['month']) ? $sData['month'] : (int) date('m');
        $year = !empty($sData['year']) ? $sData['year'] : date("Y");
        $collections = [];
        foreach($locations as $key => $location){
            $collections[] = (object) [
                'branch' => $location->loc_name,
                'hq_income' => $this->getRegIncome($year, $key, $location->id) * (45/100),
                'shq' => $this->getByName($year, $month, 'Other Income - HQ Sacrifice', $location->id),
                'posp' => $this->getByName($year, $month, 'Dr Paul Special Offering', $location->id),
                'pomb' => $this->getByName($year, $month, 'Dr Mrs Becky Special Offering', $location->id),
                // 'rspt' => $this->getByName($year, $key, 'Resident Pastor Offering', $location->id),
                'total' => ($this->getRegIncome($year, $key, $location->id) * (45/100)) + $this->getByName($year, $month, 'Other Income - HQ Sacrifice', $location->id)
                + $this->getByName($year, $month, 'Dr Paul Special Offering', $location->id) + $this->getByName($year, $month, 'Dr Mrs Becky Special Offering', $location->id),
                'year_total' => $this->getByYear($year, $location->id),
            ];
        }

        $collections[] = (object) [
            'branch' => "Grand Total",
            'hq_income' => $this->getRegIncome($year, $key, "all") * (45/100),
            'shq' => $this->getByName($year, $month, 'Other Income - HQ Sacrifice', "all"),
            'posp' => $this->getByName($year, $month, 'Dr Paul Special Offering', "all"),
            'pomb' => $this->getByName($year, $month, 'Dr Mrs Becky Special Offering', "all"),
            // 'rspt' => $this->getByName($year, $key, 'Resident Pastor Offering', "all"),
            'total' => ($this->getRegIncome($year, $key, "all") * (45/100)) + $this->getByName($year, $month, 'Other Income - HQ Sacrifice', "all")
            + $this->getByName($year, $month, 'Dr Paul Special Offering', "all") + $this->getByName($year, $month, 'Dr Mrs Becky Special Offering', "all"),
            'year_total' => $this->getByYear($year, "all"),
        ];
        
        return collect($collections);
    }

    public function LocationsIncomeDistribution($sData, $locations)
    {
        $month = !empty($sData['month']) ? $sData['month'] : (int) date('m');
        $year = !empty($sData['year']) ? $sData['year'] : date("Y");
        $collections = [];
        $hq_income = 0;
        $tithe = 0;
        $salary = 0;
        $mission = 0;
        $kingdom = 0;
        $reserve = 0;
        foreach($locations as $key => $location){
            $collections[] = (object) [
                'branch' => $location->loc_name,
                'hq_income' => $this->getRegIncome($year, $key, $location->id) * (45/100),
                'tithe' => $this->getRegIncome($year, $key, $location->id) * (10/100),
                'salary' => $this->getRegIncome($year, $key, $location->id) * (20/100),
                'mission' => $this->getRegIncome($year, $key, $location->id) * (8/100),
                'kingdom' => $this->getRegIncome($year, $key, $location->id) * (2/100),
                'reserve' => $this->getRegIncome($year, $key, $location->id) * (5/100),
            ];
            $hq_income += $this->getRegIncome($year, $key, $location->id) * (45/100);
            $tithe += $this->getRegIncome($year, $key, $location->id) * (10/100);
            $salary += $this->getRegIncome($year, $key, $location->id) * (20/100);
            $mission += $this->getRegIncome($year, $key, $location->id) * (8/100);
            $kingdom += $this->getRegIncome($year, $key, $location->id) * (2/100);
            $reserve += $this->getRegIncome($year, $key, $location->id) * (5/100);
        }
        $collections[] = (object) [
            'branch' => "Grand Total",
            'hq_income' => $hq_income,
            'tithe' => $tithe,
            'salary' => $salary,
            'mission' => $mission,
            'kingdom' => $kingdom,
            'reserve' => $reserve,
        ];
        
        return collect($collections);
    }

    public function locationIncomeDistribution($sData)
    {
        // $sData = $request->all();
        $year = !empty($sData['year']) ? $sData['year'] : (int) date('Y');
        $months = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
        ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER"];
        $range = range(!empty($sData['fmonth']) ? (int) $sData['fmonth'] : 1, !empty($sData['emonth']) ? (int) $sData['emonth'] : (int) date('m'));
        $bmonths = (!empty($sData['year']) && $year !== date('Y')) ? ((empty($sData['fmonth']) && empty($sData['emonth'])) ? 
        $months : array_intersect_key($months, array_flip($range))) : 
        array_intersect_key($months, array_flip($range));
        $collections = [];
        foreach($bmonths as $key => $month){
            $collections[] = (object) [
                'month_key' => $key,
                'month' => $month,
                'branch_income' => $this->getRegIncome($year, $key) * (55/100),
                'recurrent' => $this->getRegIncome($year, $key) * (30/100),
                'location_project' => $this->getRegIncome($year, $key) * (20/100),
                'location_reserve' => $this->getRegIncome($year, $key) * (5/100),
                'status' => ($this->checkDisbursement($year, $key) == false ) ? "NOT SUBMITTED" : "SUBMITTED",
            ];
        }
        
        return collect($collections);
    }

    public function yearlySummary($sData){
        $sdate = (int) date("Y") - 5; //Start Year = defined year (1981)
        $edate = date("Y"); //End Year = Current Year
        $years = range ($sdate,$edate);
        $collections = [];
        foreach($years as $year){
            $collections[] = (object) [
                'year' => $year,
                'total' => $this->getByYear($year) ,
                'branch_income' => $this->getByYear($year) * (55/100),
                'recurrent' => ($this->getByYear($year) * (55/100)) * (30/100),
                'location_project' => ($this->getByYear($year) * (55/100)) * (20/100),
                'location_reserve' => ($this->getByYear($year) * (55/100)) * (5/100),
            ];
        }
        return collect($collections);
    }

    public function recurrentIncome($sData)
    {
        $year = !empty($sData['year']) ? $sData['year'] : (int) date('Y');
        $months = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
        ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER"];
        $range = range(!empty($sData['fmonth']) ? (int) $sData['fmonth'] : 1, !empty($sData['emonth']) ? (int) $sData['emonth'] : (int) date('m'));
        $bmonths = (!empty($sData['year']) && $year !== date('Y')) ? ((empty($sData['fmonth']) && empty($sData['emonth'])) ? 
        $months : array_intersect_key($months, array_flip($range))) : 
        array_intersect_key($months, array_flip($range));
        $collections = [];
        foreach($bmonths as $key => $month){
            $collections[] = (object) [
                'month_key' => $key,
                'month' => $month,
                'amount' => $this->getRegIncome($year, $key) * (30/100),
                'prev_balnace' => ($key == 1) ? ($this->getRegIncome($year-1, 12)) * (30/100) : ($this->getRegIncome($year, $key-1)) * (30/100),
                'total' => ($key == 1) ? ($this->getRegIncome($year-1, 12)) * (30/100) + ($this->getRegIncome($year, $key)) * (30/100) :
                ($this->getRegIncome($year, $key - 1)) * (30/100) + ($this->getRegIncome($year, $key)) * (30/100),
                'last_balance' => ($key == 1) ? ($this->getRegIncome($year-1, 12)) * (30/100) - $this->getBalanceExpenditureRecurrent($year, $key,'recurrent') 
                : ($this->getRegIncome($year, $key)) * (30/100) - $this->getBalanceExpenditureRecurrent($year, $key,'recurrent'),
                'expenditure' => $this->getBalanceExpenditureRecurrent($year, $key,'recurrent'),
                'status' => ($this->checkDisbursement($year, $key) == false ) ? "NOT SUBMITTED" : "SUBMITTED",
            ];
        }
        
        return collect($collections);
    }

    public function locationManagement($sData)
    {
        $year = !empty($sData['year']) ? $sData['year'] : (int) date('Y');
        $months = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
        ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER"];
        $range = range(!empty($sData['fmonth']) ? (int) $sData['fmonth'] : 1, !empty($sData['emonth']) ? (int) $sData['emonth'] : (int) date('m'));
        $bmonths = (!empty($sData['year']) && $year !== date('Y')) ? ((!empty($sData['fmonth']) && !empty($sData['emonth'])) ? 
        $months : array_intersect_key($months, array_flip($range))) : 
        array_intersect_key($months, array_flip($range));
        $collections = [];
        foreach($bmonths as $key => $month){
            $collections[] = (object) [
                'month_key' => $key,
                'month' => $month,
                'amount' => $this->getRegIncome($year, $key) * (20/100),
                'slpf' => $this->getByName($year, $key, 'Location Project Offering'),
                'cphq' => $this->getByName($year, $key, 'Capital Project Income from HQ (CPHQ)'),
                'prev_balance' => $this->getloctionPreviousBalance($year, $key, 20/100),
                'total' => $this->gettotalLocationBalance($key, $year),
                'last_balance' => ($key == 1) ? $this->getloctionPreviousBalance($year, $key, 20/100) - $this->getBalanceExpenditureRecurrent($year, $key, 'location_project') 
                : $this->gettotalLocationBalance($key, $year, 20/100) - $this->getBalanceExpenditureRecurrent($year, $key, 'location_project'),
                'expenditure' => $this->getBalanceExpenditureRecurrent($year, $key, 'location_project'),
                'status' => ($this->checkDisbursement($year, $key) == false ) ? "NOT SUBMITTED" : "SUBMITTED",
            ];
        }
        
        return collect($collections);
    }

    // public function capitalExpenditure() 
    // {
    //     $year = !empty($sData['year']) ? $sData['year'] : (int) date('Y');
    //     $months = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
    //     ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER"];
    //     $range = range(!empty($sData['fmonth']) ? (int) $sData['fmonth'] : 1, !empty($sData['emonth']) ? (int) $sData['emonth'] : (int) date('m'));
    //     $bmonths = (!empty($sData['year']) && $year !== date('Y')) ? ((!empty($sData['fmonth']) && !empty($sData['emonth'])) ? 
    //     $months : array_intersect_key($months, array_flip($range))) : 
    //     array_intersect_key($months, array_flip($range));
    //     $collections = [];
    //     foreach($bmonths as $key => $month){
    //         $collections[] = (object) [
    //             'month_key' => $key,
    //             'month' => $month,
    //             'amount' => $this->getRegIncome($year, $key) * (20/100),
    //             'slpf' => $this->getByName($year, $key, 'Location Project Offering'),
    //             'cphq' => $this->getByName($year, $key, 'Capital Project Income from HQ (CPHQ)'),
    //             'prev_balance' => $this->getloctionPreviousBalance($year, $key),
    //             'total' => $this->gettotalLocationBalance($key, $year),
    //             'last_balance' => ($key == 1) ? $this->getloctionPreviousBalance($year, $key) : $this->gettotalLocationBalance($key - 1, $year),
    //             'expenditure' => $this->getBalanceExpenditureRecurrent($year, $key, 'location_project'),
    //             'status' => ($this->checkDisbursement($year, $key) == false ) ? "NOT SUBMITTED" : "SUBMITTED",
    //         ];
    //     }
    // }

    public function locationReserveManagement($sData)
    {
        $year = !empty($sData['year']) ? $sData['year'] : (int) date('Y');
        $months = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
        ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER"];
        $range = range(!empty($sData['fmonth']) ? (int) $sData['fmonth'] : 1, !empty($sData['emonth']) ? (int) $sData['emonth'] : (int) date('m'));
        $bmonths = (!empty($sData['year']) && $year !== date('Y')) ? ((empty($sData['fmonth']) && empty($sData['emonth'])) ? 
        $months : array_intersect_key($months, array_flip($range))) : 
        array_intersect_key($months, array_flip($range));
        $collections = [];
        foreach($bmonths as $key => $month){
            $collections[] = (object) [
                'month_key' => $key,
                'month' => $month,
                'amount' => $this->getRegIncome($year, $key) * (5/100),
                'prev_balance' => $this->getloctionPreviousBalance($year, $key, 5/100),
                'total' => $this->gettotalLocationReserveBalance($key, $year, 5/100),
                'last_balance' => ($key == 1) ? $this->getloctionPreviousBalance($year, $key, 5/100) - $this->getBalanceExpenditureRecurrent($year, $key, 'location_reserve')
                 : $this->gettotalLocationReserveBalance($key, $year, 5/100) - $this->getBalanceExpenditureRecurrent($year, $key, 'location_reserve'),
                'expenditure' => $this->getBalanceExpenditureRecurrent($year, $key, 'location_reserve'),
                'status' => ($this->checkDisbursement($year, $key) == false ) ? "NOT SUBMITTED" : "SUBMITTED",
            ];
        }
        
        return collect($collections);
    }

    function getloctionPreviousBalance($key, $year, $percent = 20/100)
    {
        return ($key == 1) ? ($this->getRegIncome($year-1, 12) * ($percent)) + $this->getByName($year, $key, 'Location Project Offering')
                + $this->getByName($year, $key, 'Capital Project Income from HQ (CPHQ)') : ($this->getRegIncome($year, $key-1) * ($percent)) + 
                $this->getByName($year, $key, 'Location Project Offering') + $this->getByName($year, $key, 'Capital Project Income from HQ (CPHQ)');
    }
    
    function getBalanceExpenditureRecurrent($year, $key, $type = "recurrent", $location = null)
    {
        $loc_id = !empty($location) ? $location : \Auth::user()->location_id;
        return LocationExpenditure::whereLocationId($loc_id)->whereType($type)->where('month', $key)->where('year', $year)->get()->sum('amount');
    }

    function gettotalLocationBalance($key, $year, $percent = 20/100)
    {
        return $this->getloctionPreviousBalance($year, $key, $percent) + $this->getRegIncome($year, $key) * ($percent) +
        $this->getByName($year, $key, 'Location Project Offering') + $this->getByName($year, $key, 'Capital Project Income from HQ (CPHQ)');
    }

    function gettotalLocationReserveBalance($key, $year, $percent = 20/100)
    {
        return $this->getloctionPreviousBalance($year, $key, $percent) + $this->getRegIncome($year, $key) * ($percent);
    }

    function getDisbursement($year, $month, $branch = 'branch', $location = null) {
        $loc_id = !empty($location) ? $location : \Auth::user()->location_id;
        $data = Disbursement::whereLocationId($loc_id)->whereType($branch)->where('year',$year)->where('month',$month)->first();
        return (!empty($data)) ? $data->amount : 0;
    }

    function checkDisbursement($year, $month, $branch = 'branch', $location = null) {
        $loc_id = !empty($location) ? $location : \Auth::user()->location_id;
        $data = Disbursement::whereLocationId($loc_id)->whereType($branch)->where('year',$year)->where('month',$month)->first();
        return (!empty($data)) ? true : false;
    }

    function getRegIncome($year, $key, $location = null){
        return $this->getByName($year, $key, 'General Offering', $location) + $this->getByName($year, $key, 'Tithes', $location) + $this->getByName($year, $key, 'Sacrifice', $location);
    }

    function getByName($year, $key, $name, $location = null) {
        $source = IncomeReportSource::where('name', $name)->first();
        if($location == "all") {
            return IncomeReport::where('year', $year)->where('month', $key)->where('income_report_source_id', $source->id)->sum('cash') + 
            IncomeReport::where('year', $year)->where('month', $key)->where('income_report_source_id', $source->id)->sum('pos') + 
            IncomeReport::where('year', $year)->where('month', $key)->where('income_report_source_id', $source->id)->sum('cheques');
        }else {
            $loc_id = !empty($location) ? $location : \Auth::user()->location_id;
            return IncomeReport::where('year', $year)->where('month', $key)->where('location_id', $loc_id)->where('income_report_source_id', $source->id)->sum('cash') + 
            IncomeReport::where('year', $year)->where('month', $key)->where('location_id', $loc_id)->where('income_report_source_id', $source->id)->sum('pos') + 
            IncomeReport::where('year', $year)->where('month', $key)->where('location_id', $loc_id)->where('income_report_source_id', $source->id)->sum('cheques');
        }
    }

    function getByYear($year, $location = null) {
        if($location == "all") {
            return IncomeReport::where('year', $year)->sum('cash') + 
            IncomeReport::where('year', $year)->sum('pos') + 
            IncomeReport::where('year', $year)->sum('cheques');
        }else {
            $loc_id = !empty($location) ? $location : \Auth::user()->location_id;
            return IncomeReport::where('year', $year)->where('location_id', $loc_id)->sum('cash') + 
            IncomeReport::where('year', $year)->where('location_id', $loc_id)->sum('pos') + 
            IncomeReport::where('year', $year)->where('location_id', $loc_id)->sum('cheques');
        }
    }
}
