<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([

            [
                'brandname' => 'Adidas'
            ],
            [
                'brandname' => 'Nike'
            ],
            [
                'brandname' => 'Puma'
            ],
            [
                'brandname' => 'Asics'
            ],
            [
                'brandname' => 'Timberland'
            ],
            [
                'brandname' => 'Fila'
            ],
            [
                'brandname' => 'Reebok'
            ],
            [
                'brandname' => 'Homyped'
            ],
        ]);
    }
}
