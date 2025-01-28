<?php

use Illuminate\Database\Seeder;
use App\IncomeReportSource;
class IncomeReportSeederUpdate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sources = [
            // [
            //     'name' => 'Dr Paul Special Offering',
            //     'description' => "any special offering to the pastor",
            //     'created_by' => 9
            // ],
            // [
            //     'name' => 'Dr Mrs Becky Special Offering',
            //     'description' => "any special offering to the pastor",
            //     'created_by' => 9
            // ],
            // [
            //     'name' => 'Capital Project Income from HQ (CPHQ)',
            //     'description' => "project offering",
            //     'created_by' => 9
            // ]
            [
                'name' => 'Resident Pastor Offering',
                'description' => "resident pastor offering",
                'created_by' => 9
            ]
        ];
        foreach($sources as $source) {
            IncomeReportSource::create($source);
        }
    }
}
