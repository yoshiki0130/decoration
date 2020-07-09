<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prefectures')->truncate();
        DB::table('genders')->truncate();
        $this->call(PrefectureSeeder::class);
        $this->call(GenderSeeder::class);
    }
}
