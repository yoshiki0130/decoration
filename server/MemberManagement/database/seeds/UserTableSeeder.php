<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
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

        DB::table('users')->insert([
            'user_id' => 'test',
            'name1' => "名字",
            'name2' => "名前",
            'yomi1' => "みょうじ",
            'yomi2' => "なまえ",
            'password' => 'test',
            'email' => "test@example.com",
            'gender_id' => random_int(1, 2),
            'prefecture_id' => random_int(1, 47),
            'created_at' => $date,
            'updated_at' => $date
        ]);

        for ($i = 1; $i <= 50; $i++) {
            $date = date('Y-m-d H:i:s', rand($min, $max));

            DB::table('users')->insert([
                'user_id' => "test{$i}",
                'name1' => "名字{$i}",
                'name2' => "名前{$i}",
                'yomi1' => "みょうじ{$i}",
                'yomi2' => "なまえ{$i}",
                'password' => 'test',
                'email' => "test{$i}@example.com",
                'gender_id' => random_int(1, 2),
                'prefecture_id' => random_int(1, 47),
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
