<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = collect(Category::pluck('id'));

        Product::factory(50)
            ->create()
            ->each(function ($product) use ($categories) {
                $product->categories()->sync(
                    $categories->random(rand(1, 3))
                );
            });
    }
}
