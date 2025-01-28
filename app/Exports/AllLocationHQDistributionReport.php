<?php

namespace App\Exports;

use App\IncomeReport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Services\AccountCollection;

class AllLocationHQDistributionReport implements FromCollection, WithHeadings
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
        return $this->account->LocationsIncomeDistribution($this->sData, $this->locations);
    }



    public function headings(): array
    {
        return ["Locations","45% remittance","Tithe 10%", "Salary 20%","Mission 8%","Kingdom 2%","Reserve 5%"];
    }
}
