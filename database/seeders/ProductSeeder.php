<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            // $table->timestamps();
            // $table->string('name');
            // $table->string('description');
            // $table->integer('stock')->default(100);
            // $table->integer('price');
            // $table->string('image')->nullable();
            // $table->string('category');
            // $table->string('brand');
            // $table->float('averageStar')->default(0);
            [
                'name' => 'Nike Shoe',
                'description' => 'Lorem Ipsum',
                'stock' => 3,
                'category' => '1',
                'brand' => 'Nike',
                'price' => '150000',
                'image_id' => '1',
                'gender' => '1'
            ],
            [
                'name' => 'Adidas Shoe',
                'description' => 'Lorem Ipsum',
                'stock' => 4,
                'category' => '1',
                'brand' => 'Adidas',
                'price' => '170000',
                'image_id' => '2',
                'gender' => '3'
            ],
            [
                'name' => 'Fila Shoe',
                'description' => 'Lorem Ipsum',
                'stock' => 4,
                'category' => '1',
                'brand' => 'Fila',
                'price' => '120000',
                'image_id' => '3',
                'gender' => '2'
            ],
            [
                'name' => 'Puma Shoes',
                'description' => 'Lorem Ipsum',
                'stock' => 4,
                'category' => '1',
                'brand' => 'Puma',
                'price' => '110000',
                'image_id' => '4',
                'gender' => '2'
            ],
            [
                'name' => 'Adidas Shoes 2',
                'description' => 'Lorem Ipsum',
                'stock' => 4,
                'category' => '1',
                'brand' => 'Adidas',
                'price' => '230000',
                'image_id' => '5',
                'gender' => '3'
            ],
            [
                'name' => 'Timberland 1',
                'description' => 'Lorem Ipsum',
                'stock' => 2,
                'category' => '2',
                'brand' => 'Timberland',
                'price' => '210000',
                'image_id' => '6',
                'gender' => '3'
            ],
            [
                'name' => 'Adidas 3',
                'description' => 'Lorem Ipsum',
                'stock' => 10,
                'category' => '1',
                'brand' => 'Adidas',
                'price' => '2000000',
                'image_id' => '7',
                'gender' => '1'
            ],
            [
                'name' => 'New Balance 3',
                'description' => 'Lorem Ipsum',
                'stock' => 10,
                'category' => '2',
                'brand' => 'New Balance',
                'price' => '2000000',
                'image_id' => '8',
                'gender' => '1'
            ],
            [
                'name' => 'Reebok Power',
                'description' => 'Lorem Ipsum',
                'stock' => 89,
                'category' => '2',
                'brand' => 'Reebok',
                'price' => '2000000',
                'image_id' => '9',
                'gender' => '2'
            ],
            [
                'name' => 'Nike Thor',
                'description' => 'Lorem Ipsum',
                'stock' => 22,
                'category' => '2',
                'brand' => 'Nike',
                'price' => '1200000',
                'image_id' => '10',
                'gender' => '1'
            ],
            [
                'name' => 'Asics Badminton',
                'description' => 'Lorem Ipsum',
                'stock' => 10,
                'category' => '1',
                'brand' => 'Asics',
                'price' => '1200000',
                'image_id' => '11',
                'gender' => '2'
            ],
            [
                'name' => 'Asics Soccer',
                'description' => 'Lorem Ipsum',
                'stock' => 12,
                'category' => '1',
                'brand' => 'Asics',
                'price' => '1200000',
                'image_id' => '12',
                'gender' => '2'
            ],
            [
                'name' => 'Yonex Tennis',
                'description' => 'Lorem Ipsum',
                'stock' => 203,
                'category' => '1',
                'brand' => 'Yonex',
                'price' => '2590000',
                'image_id' => '13',
                'gender' => '2'
            ]
        ]);
    }
}
