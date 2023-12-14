<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            UserSeeder::class,
            ProductSeeder::class,
            SizeSeeder::class,
            ImageSeeder::class,
            ReviewSeeder::class,
            GenderSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            PaymentSeeder::class,
        ]);
    }
}
