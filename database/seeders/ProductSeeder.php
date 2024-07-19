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
        for ($i=0; $i < 20; $i++) { 
            DB::table('products')->insert([
                'category_id' => fake()->numberBetween(1,6),
                'name' => fake()->text(15),
                'image' => 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/453754/item/vngoods_01_453754.jpg?width=750',
                'price' => fake()->randomFloat(2,200000,500000),
                'description' => fake()->text(),
                'quantity' => fake()->randomNumber(3,false),
            ]);
        }
    }
}
