<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++) {
            DB::table('reviews')->insert([
                'product_id' => rand(1, 6),
                'user_id' => rand(1, 3),
                'star' => rand(1, 5),
                'comment' => $this->generateRandomWords(15),
            ]);
        }
    }

    private function generateRandomWords($count)
    {
        $faker = \Faker\Factory::create();
        $words = $faker->words($count);
        return implode(' ', $words);
    }
}
