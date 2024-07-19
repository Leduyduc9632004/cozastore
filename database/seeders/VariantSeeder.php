<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($product_id =1; $product_id < 21; $product_id ++) { 
            for ($size_id =1; $size_id < 5; $size_id ++) { 
                for ($color_id =1; $color_id < 6; $color_id ++) { 
                    DB::table('variants')->insert([
                        'product_id' => $product_id,
                        'size_id' => $size_id,
                        'color_id' => $color_id,
                        'quantity' => fake()->numberBetween(20,150),
                    ]);
                }
            }
        }
    }
}
