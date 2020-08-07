<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DiariesSeeder extends Seeder
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

        DB::table('diaries')->insert([
            [
            'users_id' => 1,
            'title' => 'テスト掲載',
            'diary' => 'テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト',
            'release' => 0,
            'created_at' => $date,
            'updated_at' => $date],
            [
            'users_id' => 2,
            'title' => 'テスト掲載02',
            'diary' => 'テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト',
            'release' => 1,
            'created_at' => $date,
            'updated_at' => $date],
        ]);
    }
}
