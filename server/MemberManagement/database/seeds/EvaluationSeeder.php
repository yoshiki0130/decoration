<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start = Carbon::create("2015", "1", "1");
        $end = Carbon::create("2020", "12", "31");
        $min = strtotime($start);
        $max = strtotime($end);
        $date = date('Y-m-d H:i:s', rand($min, $max));

        DB::table('evaluation')->insert([
            'users_id' => 1,
            'diary_id' => 2,
            'evaluation' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        for ($i = 2; $i <= 20; $i++) {
            DB::table('evaluation')->insert([
                'users_id' => $i,
                'diary_id' => 1,
                'evaluation' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ]);
        }
    }
}
