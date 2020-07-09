<?php

use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
            ['gender_id' => 1, 'name' => '男'],
            ['gender_id' => 2, 'name' => '女'],
        ]);
    }
}
