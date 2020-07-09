<?php

use Illuminate\Database\Seeder;

class PrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voprefecture_id
     */
    public function run()
    {
        DB::table('prefectures')->insert([
            ['prefecture_id' => 1, 'name' => '北海道'],
            ['prefecture_id' => 2, 'name' => '青森県'],
            ['prefecture_id' => 3, 'name' => '岩手県'],
            ['prefecture_id' => 4, 'name' => '宮城県'],
            ['prefecture_id' => 5, 'name' => '秋田県'],
            ['prefecture_id' => 6, 'name' => '山形県'],
            ['prefecture_id' => 7, 'name' => '福島県'],
            ['prefecture_id' => 8, 'name' => '茨城県'],
            ['prefecture_id' => 9, 'name' => '栃木県'],
            ['prefecture_id' => 10, 'name' => '群馬県'],
            ['prefecture_id' => 11, 'name' => '埼玉県'],
            ['prefecture_id' => 12, 'name' => '千葉県'],
            ['prefecture_id' => 13, 'name' => '東京都'],
            ['prefecture_id' => 14, 'name' => '神奈川県'],
            ['prefecture_id' => 15, 'name' => '新潟県'],
            ['prefecture_id' => 16, 'name' => '富山県'],
            ['prefecture_id' => 17, 'name' => '石川県'],
            ['prefecture_id' => 18, 'name' => '福井県'],
            ['prefecture_id' => 19, 'name' => '山梨県'],
            ['prefecture_id' => 20, 'name' => '長野県'],
            ['prefecture_id' => 21, 'name' => '岐阜県'],
            ['prefecture_id' => 22, 'name' => '静岡県'],
            ['prefecture_id' => 23, 'name' => '愛知県'],
            ['prefecture_id' => 24, 'name' => '三重県'],
            ['prefecture_id' => 25, 'name' => '滋賀県'],
            ['prefecture_id' => 26, 'name' => '京都府'],
            ['prefecture_id' => 27, 'name' => '大阪府'],
            ['prefecture_id' => 28, 'name' => '兵庫県'],
            ['prefecture_id' => 29, 'name' => '奈良県'],
            ['prefecture_id' => 30, 'name' => '和歌山県'],
            ['prefecture_id' => 31, 'name' => '鳥取県'],
            ['prefecture_id' => 32, 'name' => '島根県'],
            ['prefecture_id' => 33, 'name' => '岡山県'],
            ['prefecture_id' => 34, 'name' => '広島県'],
            ['prefecture_id' => 35, 'name' => '山口県'],
            ['prefecture_id' => 36, 'name' => '徳島県'],
            ['prefecture_id' => 37, 'name' => '香川県'],
            ['prefecture_id' => 38, 'name' => '愛媛県'],
            ['prefecture_id' => 39, 'name' => '高知県'],
            ['prefecture_id' => 40, 'name' => '福岡県'],
            ['prefecture_id' => 41, 'name' => '佐賀県'],
            ['prefecture_id' => 42, 'name' => '長崎県'],
            ['prefecture_id' => 43, 'name' => '熊本県'],
            ['prefecture_id' => 44, 'name' => '大分県'],
            ['prefecture_id' => 45, 'name' => '宮崎県'],
            ['prefecture_id' => 46, 'name' => '鹿児島県'],
            ['prefecture_id' => 47, 'name' => '沖縄県'],
        ]);
    }
}
