<?php

namespace App\Exports;

use App\IncomeReport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LocationIncomeReport implements FromCollection, WithHeadings
{
    protected $location, $year;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($location, $year)
    {
        $this->location = $location;
        $this->year = $year;
    }

    public function collection()
    {
        $months = [1 => 'JANUARY',2 => 'FEBUARY',3 => 'MARCH',4 => "APRIL",5 => "MAY",6 => "JUNE"
        ,7 => "JULY",8 => "AUGUST",9 => "SEPTEMBER",10 => "OCTOBER",11 => "NOVEMBER",12 => "DECEMBER", 13 => "Year Total"];
        $collection = [];
        foreach($months as $key => $month) {
            if($key == 13) {
                $collection[] = [
                    'months' => $month,
                    'cash' => number_format((IncomeReport::where('year', $this->year)->where('location_id', $this->location->id)->sum('cash')), 0),
                    'pos' => number_format((IncomeReport::where('year', $this->year)->where('location_id', $this->location->id)->sum('pos')), 0),
                    'cheques' => number_format((IncomeReport::where('year', $this->year)->where('location_id', $this->location->id)->sum('cheques')), 0),
                    'grand total' => number_format(( IncomeReport::where('year', $this->year)->where('location_id', $this->location->id)->sum('cash') + \App\IncomeReport::where('year', $this->year)->where('location_id', $this->location->id)->sum('pos') + \App\IncomeReport::where('year', $this->year)->where('location_id', $this->location->id)->sum('cheques')), 0)
                ];
            }else {
                $collection[] = [
                    'months' => $month,
                    'cash' => number_format((IncomeReport::where('year', $this->year)->where('month', $key)->where('location_id', $this->location->id)->sum('cash')), 0),
                    'pos' => number_format((IncomeReport::where('year', $this->year)->where('month', $key)->where('location_id', $this->location->id)->sum('pos')), 0),
                    'cheques' => number_format((IncomeReport::where('year', $this->year)->where('month', $key)->where('location_id', $this->location->id)->sum('cheques')), 0),
                    'grand total' => number_format(( IncomeReport::where('year', $this->year)->where('month', $key)->where('location_id', $this->location->id)->sum('cash') + \App\IncomeReport::where('year', $this->year)->where('month', $key)->where('location_id', $this->location->id)->sum('pos') + \App\IncomeReport::where('year', $this->year)->where('month', $key)->where('location_id', $this->location->id)->sum('cheques')), 0)
                ];
            }
        }
        return collect($collection);
    }



    public function headings(): array
    {
        return [
            'Months',
            'Cash',
            'Pos',
            'Cheques',
            'Grand Total',
        ];
    }
}
