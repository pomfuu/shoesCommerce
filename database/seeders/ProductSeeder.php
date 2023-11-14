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
                'description' => 'lorem ipsum',
                'stock' => 3,
                'category' => 'sneaker',
                'brand' => 'nike',
                'averageStar' => 3.4,
                'price' => '150000',
                'image' => 's1'
            ],
            [
                'name' => 'Adidas Shoe',
                'description' => 'lorem ipsum',
                'stock' => 4,
                'category' => 'sneaker',
                'brand' => 'adidas',
                'averageStar' => 3.7,
                'price' => '170000',
                'image' => 's2'
            ],
            [
                'name' => 'Fila Shoe',
                'description' => 'lorem ipsum',
                'stock' => 4,
                'category' => 'sneaker',
                'brand' => 'fila',
                'averageStar' => 3.7,
                'price' => '120000',
                'image' => 's3'
            ],
            [
                'name' => 'Puma Shoes',
                'description' => 'lorem ipsum',
                'stock' => 4,
                'category' => 'sneaker',
                'brand' => 'adidas',
                'averageStar' => 3.5,
                'price' => '110000',
                'image' => 's4'
            ],
            [
                'name' => 'Adidas Shoes 2',
                'description' => 'lorem ipsum',
                'stock' => 4,
                'category' => 'sneaker',
                'brand' => 'adidas',
                'averageStar' => 3.7,
                'price' => '230000',
                'image' => 's5'
            ]
        ]);
    }
}
