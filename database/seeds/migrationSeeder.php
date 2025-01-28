<?php

use Illuminate\Database\Seeder;

class migrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $migrations = [
            // '2020_02_20_193326_create_disbursements_table',
            // '2020_02_21_122742_add_type_to_location_expenditures_table',
            '2020_02_21_130046_add_fields_to_location_expenditures_table',
        ];

        foreach ($migrations as $migration) {
            require_once base_path("database/migrations/{$migration}.php");

            $classes = get_declared_classes();
            
            $class = end($classes);

            (new $class)->up();

            DB::table('migrations')->insert([
                'migration' => $migration,
                'batch'     => 19,
            ]);
        }
    }
}
