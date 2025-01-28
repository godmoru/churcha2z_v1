<?php

namespace App\Exports;

use App\{IncomeReport,LocationExpenditure};
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LocationFinancialSummaryReport implements FromCollection, WithHeadings
{
    protected $location, $year, $month;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($locations, $year, $month)
    {
        $this->locations = $locations;
        $this->year = $year;
        $this->month = $month;
    }

    public function collection()
    {
        $collection = [];
        foreach($this->locations as $key => $location) {
            $collection[] = [
                'branch' => $location->loc_name,
                'month_income' => number_format((IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->sum('cash') 
                + IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->sum('pos') 
                + IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->sum('cheques')), 2),
                'year_income' => number_format((IncomeReport::where('year', $this->year)->where('location_id', $location->id)->sum('cash') 
                + IncomeReport::where('year', $this->year)->where('location_id', $location->id)->sum('pos') 
                + IncomeReport::where('year', $this->year)->where('location_id', $location->id)->sum('cheques')), 2),
                'month_expenditure' => number_format((LocationExpenditure::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->sum('amount') ), 2) ,
                'year_expenditure' => number_format((LocationExpenditure::where('year', $this->year)->where('location_id', $location->id)->sum('amount') ), 2) ,
                'balance' => number_format((IncomeReport::where('year', $this->year)->where('location_id', $location->id)->sum('cash') + 
                IncomeReport::where('year', $this->year)->where('location_id', $location->id)->sum('pos') 
                + IncomeReport::where('year', $this->year)->where('location_id', $location->id)->sum('cheques')
                 - LocationExpenditure::where('year', $this->year)->where('location_id', $location->id)->sum('amount')), 2)
            ];
        }
        $collection[] = [
            'branch' => "Grand Total",
            'month_income' => number_format((IncomeReport::where('year', $this->year)->where('month', $this->month)->sum('cash') 
            + IncomeReport::where('year', $this->year)->where('month', $this->month)->sum('pos') 
            + IncomeReport::where('year', $this->year)->where('month', $this->month)->sum('cheques')), 2),
            'year_income' => number_format((IncomeReport::where('year', $this->year)->sum('cash') 
            + IncomeReport::where('year', $this->year)->sum('pos') 
            + IncomeReport::where('year', $this->year)->sum('cheques')), 2),
            'month_expenditure' => number_format((LocationExpenditure::where('year', $this->year)->where('month', $this->month)->sum('amount') ), 2) ,
            'year_expenditure' => number_format((LocationExpenditure::where('year', $this->year)->sum('amount') ), 2) ,
            'balance' => number_format((IncomeReport::where('year', $this->year)->sum('cash') + 
            IncomeReport::where('year', $this->year)->sum('pos') 
            + IncomeReport::where('year', $this->year)->sum('cheques')
             - LocationExpenditure::where('year', $this->year)->sum('amount')), 2)
        ];
        return collect($collection);
    }



    public function headings(): array
    {
        return [
            'Branch Name',
            'Month Income',
            'Year Income',
            'Month Expenditure',
            'Year Expenditure',
            'Balance'
        ];
    }
}
