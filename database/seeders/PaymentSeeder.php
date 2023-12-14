<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([

            [
                'name' => 'BCA',
                'virtual_account' => '99988932673',
            ],
            [
                'name' => 'Mandiri',
                'virtual_account' => '99667452362',
            ],
            [
                'name' => 'BNI',
                'virtual_account' => '99939812381',
            ],
        ]);
    }
}
