<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_images')->insert([

            [
                'image_id' => 1,
                'main_image' => 's1.jpg',
                'sec_image' => 's1.jpg',
                'third_image' => 's1.jpg',
                'fourth_image' => 's1.jpg',
                'fifth_image' => 's1.jpg',
            ],
            [
                'image_id' => 2,
                'main_image' => 's2.jpg',
                'sec_image' => 's2.jpg',
                'third_image' => 's2.jpg',
                'fourth_image' => 's2.jpg',
                'fifth_image' => 's2.jpg',
            ],
            [
                'image_id' => 3,
                'main_image' => 's3.jpg',
                'sec_image' => 's3.jpg',
                'third_image' => 's3.jpg',
                'fourth_image' => 's3.jpg',
                'fifth_image' => 's3.jpg',
            ],
            [
                'image_id' => 4,
                'main_image' => 's4.jpg',
                'sec_image' => 's4.jpg',
                'third_image' => 's4.jpg',
                'fourth_image' => 's4.jpg',
                'fifth_image' => 's4.jpg',
            ],
            [
                'image_id' => 5,
                'main_image' => 's5.jpg',
                'sec_image' => 's5.jpg',
                'third_image' => 's5.jpg',
                'fourth_image' => 's5.jpg',
                'fifth_image' => 's5.jpg',
            ],
            [
                'image_id' => 6,
                'main_image' => 's6.jpg',
                'sec_image' => 's6.jpg',
                'third_image' => 's6.jpg',
                'fourth_image' => 's6.jpg',
                'fifth_image' => 's6.jpg',
            ],
            [
                'image_id' => 7,
                'main_image' => 's7.jpg',
                'sec_image' => 's7.jpg',
                'third_image' => 's7.jpg',
                'fourth_image' => 's7.jpg',
                'fifth_image' => 's7.jpg',
            ],
            [
                'image_id' => 8,
                'main_image' => 's8.jpg',
                'sec_image' => 's8.jpg',
                'third_image' => 's8.jpg',
                'fourth_image' => 's8.jpg',
                'fifth_image' => 's8.jpg',
            ],
            [
                'image_id' => 9,
                'main_image' => 's9.jpg',
                'sec_image' => 's9.jpg',
                'third_image' => 's9.jpg',
                'fourth_image' => 's9.jpg',
                'fifth_image' => 's9.jpg',
            ],
            [
                'image_id' => 10,
                'main_image' => 's10.jpg',
                'sec_image' => 's10.jpg',
                'third_image' => 's10.jpg',
                'fourth_image' => 's10.jpg',
                'fifth_image' => 's10.jpg',
            ],
            [
                'image_id' => 11,
                'main_image' => 's11.jpg',
                'sec_image' => 's11.jpg',
                'third_image' => 's11.jpg',
                'fourth_image' => 's11.jpg',
                'fifth_image' => 's11.jpg',
            ],
            [
                'image_id' => 12,
                'main_image' => 's12.jpg',
                'sec_image' => 's12.jpg',
                'third_image' => 's12.jpg',
                'fourth_image' => 's12.jpg',
                'fifth_image' => 's12.jpg',
            ],
            [
                'image_id' => 13,
                'main_image' => 's13.jpg',
                'sec_image' => 's13.jpg',
                'third_image' => 's13.jpg',
                'fourth_image' => 's13.jpg',
                'fifth_image' => 's13.jpg',
            ],
        ]);
    }
}
