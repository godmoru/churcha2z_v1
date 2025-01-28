<?php

namespace App\Exports;

use App\IncomeReport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class IncomeReportExport implements FromCollection//, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return IncomeReport::select('id', 'service_date', 'year', 'month', 'cash', 'pos', 'cheques')->whereDate('created_at', \Carbon\Carbon::today())->get();
    }
}
