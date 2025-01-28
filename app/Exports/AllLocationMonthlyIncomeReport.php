<?php

namespace App\Exports;

use App\IncomeReport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AllLocationMonthlyIncomeReport implements FromCollection, WithHeadings
{
    protected $locations, $month, $year;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($locations, $year, $month)
    {
        $this->locations = $locations;
        $this->month = $month;
        $this->year = $year;
    }

    public function collection()
    {
        $collection = [];
        foreach($this->locations as $key => $location) {
                $collection[] = [
                    'branch name' => strtoupper($location->loc_name),
                    'general offering' => number_format((IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->where('income_report_source_id', 1)->sum('cash') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->where('income_report_source_id', 1)->sum('pos') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->where('income_report_source_id', 1)->sum('cheques')), 0),
                    'tithes' => number_format((IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->where('income_report_source_id', 2)->sum('cash') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->where('income_report_source_id', 2)->sum('pos') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->where('income_report_source_id', 2)->sum('cheques')), 0),
                    'location project offering' => number_format((IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->where('income_report_source_id', 3)->sum('cash') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->where('income_report_source_id', 3)->sum('pos') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->where('income_report_source_id', 3)->sum('cheques')), 0),
                    'sacrifice' => number_format((IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->where('income_report_source_id', 4)->sum('cash') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->where('income_report_source_id', 4)->sum('pos') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->where('income_report_source_id', 4)->sum('cheques')), 0),
                    'other income - hq sacrifice' => number_format((IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->where('income_report_source_id', 5)->sum('cash') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->where('income_report_source_id', 5)->sum('pos') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->where('income_report_source_id', 5)->sum('cheques')), 0),
                    'month total' => number_format((IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('location_id', $location->id)->sum('cheques')), 0),
                    'year total' => number_format((IncomeReport::where('year', $this->year)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', $this->year)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', $this->year)->where('location_id', $location->id)->sum('cheques')), 0),
                ];
        }
        $collection[] = [
            'branch name' => "Grand Total",
            'general offering' => number_format((IncomeReport::where('year', $this->year)->where('month', $this->month)->where('income_report_source_id', 1)->sum('cash') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('income_report_source_id', 1)->sum('pos') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('income_report_source_id', 1)->sum('cheques')), 0),
            'tithes' => number_format((IncomeReport::where('year', $this->year)->where('month', $this->month)->where('income_report_source_id', 2)->sum('cash') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('income_report_source_id', 2)->sum('pos') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('income_report_source_id', 2)->sum('cheques')), 0),
            'location project offering' => number_format((IncomeReport::where('year', $this->year)->where('month', $this->month)->where('income_report_source_id', 3)->sum('cash') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('income_report_source_id', 3)->sum('pos') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('income_report_source_id', 3)->sum('cheques')), 0),
            'sacrifice' => number_format((IncomeReport::where('year', $this->year)->where('month', $this->month)->where('income_report_source_id', 4)->sum('cash') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('income_report_source_id', 4)->sum('pos') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('income_report_source_id', 4)->sum('cheques')), 0),
            'other income - hq sacrifice' => number_format((IncomeReport::where('year', $this->year)->where('month', $this->month)->where('income_report_source_id', 5)->sum('cash') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('income_report_source_id', 5)->sum('pos') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->where('income_report_source_id', 5)->sum('cheques')), 0),
            'month total' => number_format((IncomeReport::where('year', $this->year)->where('month', $this->month)->sum('cash') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->sum('pos') + \App\IncomeReport::where('year', $this->year)->where('month', $this->month)->sum('cheques')), 0),
            'year total' => number_format((IncomeReport::where('year', $this->year)->sum('cash') + \App\IncomeReport::where('year', $this->year)->sum('pos') + \App\IncomeReport::where('year', $this->year)->sum('cheques')), 0),
        ];
        return collect($collection);
    }



    public function headings(): array
    {
        return [
            'BRANCH NAME',
            'GENERAL OFFERING',
            'TITHES',
            'LOCATION PROJECT OFFERING',
            'SACRIFICE',
            'OTHER INCOME - HQ SACRIFICE',
            'MONTH TOTAL',
            'YEAR TOTAL'
        ];
    }
}
