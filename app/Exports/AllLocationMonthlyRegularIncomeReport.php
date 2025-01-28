<?php

namespace App\Exports;

use App\IncomeReport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Services\AccountCollection;

class AllLocationMonthlyRegularIncomeReport implements FromCollection, WithHeadings
{
    protected $locations, $sData, $account;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($locations, $sData,AccountCollection $account)
    {
        $this->locations = $locations;
        $this->sData = $sData;
        $this->account = $account;
    }

    public function collection()
    {
        return $this->account->LocationregularIncome($this->sData, $this->locations);
    }



    public function headings(): array
    {
        return ["Locations","Total Regular income","Special location project Fund","Capital Project Income from HQ","Special HQ sacrificial offering",
        "Prophet Offering for Snr Pastor","Prophet Offering for Mummy Becky","Total Inflow"];
    }
}
