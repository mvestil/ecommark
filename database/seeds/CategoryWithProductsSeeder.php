<?php

use Illuminate\Database\Seeder;

class CategoryWithProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = factory(App\Models\Category::class, 20)->create();

        $products = App\Models\Product::all();
        $products->each(function ($product) use ($categories) {
            $product->categories()->attach(
                $categories->random(rand(1, 20))->pluck('id')->toArray()
            );
        });
    }
}
