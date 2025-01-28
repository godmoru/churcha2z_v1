<?php

namespace App\Services\Account;
use stdClass;
use App\Services\AccountCollection;
use App\{IncomeReportSource,ExpenditureType,Location};
use DateTime;
class LocationSummary {
    protected $account;

    public function __construct(AccountCollection $account)
    {
        $this->account = $account;
    }

    public function getSingelocationSummary($sData, $type) {
        $param['pageName'] ="Income Summary";
        $param['incomeSource'] = $sources = IncomeReportSource::all();
        $param['expenditure_types'] = ExpenditureType::all();
        $param['years'] = range (2015,date("Y"));
        $param['type'] = $type;
        $param['year'] = $year = !empty($sData['year']) ? $sData['year'] : (int) date('Y');
        $param['bmonths'] = $months = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
        ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER"];
        $range = range(!empty($sData['fmonth']) ? (int) $sData['fmonth'] : 1, !empty($sData['emonth']) ? (int) $sData['emonth'] : (int) date('m'));
        $param['months'] = (!empty($sData['year']) && $year !== date('Y')) ? ((!empty($sData['fmonth']) && !empty($sData['emonth'])) ? 
        $months : array_intersect_key($months, array_flip($range))) : 
        array_intersect_key($months, array_flip($range));
        // if($type == 'location_income') {
            $param['regulars_header'] = ["Month","Total Regular income","Special location project Fund","Capital Project Income from HQ","Special HQ sacrificial offering",
            "Prophet Offering for Snr Pastor","Prophet Offering for Mummy Becky","Resident Pastor Offering","Total Inflow"];
            $param['requlars'] = $this->account->regularIncome($sData);
        // } elseif($type == 'location_distribution') {
            $param['loction_dist_header'] = ["Month","55% for the branch","Recurrent 30%",
            "Location Project 20%","Location Reserve 5%","Status"];
            $param['reqular_income'] = $this->account->pastMonthIncome($sData);
        // } elseif($type == 'location_distribution') {
        // }
        $param['regular_income_header'] = ["Month","Total Regular Income of the month","55% for the branch",
        "45% for the HQ","Action"];
        $param['year_loction_dist_header'] = ["Year","Total","55% for the branch","Recurrent 30%",
        "Location Project 20%","Location Reserve 5%"];
        $param['recurrent_header'] = ["Month","Recurrent Expenditure 30% of the current month","Balance B/F From previous month",
        "Current total","Expenditure incurred account","Bal C/D for the Month","Status"];
        $param['location_project_header'] = ["Month","Location Project 20% of current month","Special location project Fund","Capital Project Income from HQ",
        "Balance B/F From previous month","Current total","Withdrawal from project account","Bal C/D for the Month","Status"];
        $param['location_reserve_header'] = ["Month","Location Reserve 5% of the current month ","Balance B/F From previous month",
        "Current total","Deduction from Reserve account","Bal C/D for the Month","Status"];
        $param['location_income_dist'] = $this->account->locationIncomeDistribution($sData);
        $param['year_location_income_dist'] = $this->account->yearlySummary($sData);
        $param['recurrent_income'] = $this->account->recurrentIncome($sData);
        $param['location_projects'] = $this->account->locationManagement($sData);
        $param['location_reserves'] = $this->account->locationReserveManagement($sData);
        $date = new DateTime('d');
        $param['last_date'] = $date->modify('last day of this month');
        $param['current_date'] = new DateTime('d');

        return $param;
    }

    public function getlocationsSummary($sData, $type) 
    {
        $param['type'] = $type;
        $param['pageName'] = " Monthly Income Summary";
        $param['years'] = range (2015,date("Y"));
        $param['months'] = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
        ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER"];
        $param['date'] = (!empty($sData['month']) && !empty($sData['year'])) ? $param['months'][$sData['month']].', '.$sData['year'] : date('F, Y');
        $param['month'] = !empty($sData['month']) ? $sData['month'] : (int) date('m');
        $param['year'] = !empty($sData['year']) ? $sData['year'] : date("Y");
        $param['locations'] = $locations = Location::where('status', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get();
        if($type == 'location_income') {
            $param['regulars_header'] = ["Locations","Total Regular income","Special location project Fund","Capital Project Income from HQ","Special HQ sacrificial offering",
                "Prophet Offering for Snr Pastor","Prophet Offering for Mummy Becky","Resident Pastor Offering","Total Inflow"];
            $param['requlars'] = $this->account->LocationregularIncome($sData, $locations);
        } elseif($type == 'location_distribution') {
            $param['loction_dist_header'] = ["Locations","45% remittance","Special HQ sacrificial offering",
            "Prophet Offering for Snr Pastor","Prophet Offering for Mummy Becky","Total for the month","Total for the year"];
            $param['reqular_income'] = $this->account->LocationsMonthIncome($sData, $locations);
        } elseif($type == 'location_hq_distribution') {
            $param['location_hq_dist_header'] = ["Locations","45% remittance","Tithe 10%", "Salary 20%",
            "Mission 8%","Kingdom 2%","Reserve 5%"];
            $param['hq_distribution'] = $this->account->LocationsIncomeDistribution($sData, $locations);
        }else {
            $param['incomeSource'] = IncomeReportSource::all();
        }
        return $param;
    }
}