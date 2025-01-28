<?php

namespace App\Exports;

use App\IncomeReport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Services\AccountCollection;

class AllLocationMonthlyDistributionReport implements FromCollection, WithHeadings
{
    protected $locations, $sData, $account;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($locations, $sData)
    {
        $this->locations = $locations;
        $this->sData = $sData;
        $this->account = new AccountCollection();
    }

    public function collection()
    {
        return $this->account->LocationsMonthIncome($this->sData, $this->locations);
    }



    public function headings(): array
    {
        return ["Locations","45% remittance","Special HQ sacrificial offering",
        "Prophet Offering for Snr Pastor","Prophet Offering for Mummy Becky","Total for the month","Total for the year"];
    }
}
