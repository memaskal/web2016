<?php

use Illuminate\Database\Seeder;

class MeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('stations')->insert([
            'id' => 'PAT',
            'name' => 'PATRA',
            'latitude' => 37,
            'longitude' => 23
        ]);

        DB::table('measurements')->insert([
            'id' => 1,
            'station_id' => 'PAT',
            'pollution_type' => 'CO',
            'date' => '2016-06-01',
        ]);

        DB::transaction(function() {
            $insert_values = [];
            $values = '40,41,43,44,40,28,36,25,18,36,43,46,55,60,62,61,50,37,44,28,17,12,4,4';
            $parse = explode(',', $values);
            foreach ($parse as $t => $val) {
                array_push($insert_values, [
                    'measurement_id' => 1,
                    'hour' => ($t + 1),
                    'value' => $val
                ]);
            }
            DB::table('measurement_values')->insert($insert_values);
        });

    }
}
