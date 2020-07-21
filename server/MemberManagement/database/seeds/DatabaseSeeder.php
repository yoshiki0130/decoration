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
        DB::table('users')->truncate();
        DB::table('coupons')->truncate();
        DB::table('coupon_user')->truncate();
        $this->call(PrefectureSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CouponSeeder::class);
    }
}
