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
                'main_image' => 's1',
                'sec_image' => 's1',
                'third_image' => 's1',
                'fourth_image' => 's1',
                'fifth_image' => 's1',
            ],
            [
                'main_image' => 's2',
                'sec_image' => 's2',
                'third_image' => 's2',
                'fourth_image' => 's2',
                'fifth_image' => 's2',
            ],
            [
                'main_image' => 's3',
                'sec_image' => 's3',
                'third_image' => 's3',
                'fourth_image' => 's3',
                'fifth_image' => 's3',
            ],
            [
                'main_image' => 's4',
                'sec_image' => 's4',
                'third_image' => 's4',
                'fourth_image' => 's4',
                'fifth_image' => 's4',
            ],
            [
                'main_image' => 's5',
                'sec_image' => 's5',
                'third_image' => 's5',
                'fourth_image' => 's5',
                'fifth_image' => 's5',
            ],
            [
                'main_image' => 's6',
                'sec_image' => 's6',
                'third_image' => 's6',
                'fourth_image' => 's6',
                'fifth_image' => 's6',
            ],
            [
                'main_image' => 's7',
                'sec_image' => 's7',
                'third_image' => 's7',
                'fourth_image' => 's7',
                'fifth_image' => 's7',
            ],
            [
                'main_image' => 's8',
                'sec_image' => 's8',
                'third_image' => 's8',
                'fourth_image' => 's8',
                'fifth_image' => 's8',
            ],
            [
                'main_image' => 's9',
                'sec_image' => 's9',
                'third_image' => 's9',
                'fourth_image' => 's9',
                'fifth_image' => 's9',
            ],
            [
                'main_image' => 's10',
                'sec_image' => 's10',
                'third_image' => 's10',
                'fourth_image' => 's10',
                'fifth_image' => 's10',
            ],
            [
                'main_image' => 's11',
                'sec_image' => 's11',
                'third_image' => 's11',
                'fourth_image' => 's11',
                'fifth_image' => 's11',
            ],
            [
                'main_image' => 's12',
                'sec_image' => 's12',
                'third_image' => 's12',
                'fourth_image' => 's12',
                'fifth_image' => 's12',
            ],
            [
                'main_image' => 's13',
                'sec_image' => 's13',
                'third_image' => 's13',
                'fourth_image' => 's13',
                'fifth_image' => 's13',
            ],
        ]);
    }
}
