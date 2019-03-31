<?php

use App\Models\Photo;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // custom product
        $product = Product::create([
            'name'             => 'Mark Product',
            'sku'              => 'markproduct',
            'description'      => 'This is product from Mark',
            'stocks_available' => 10000,
            'price'            => 100.00,
        ]);

        $product->photos()->save(factory(Photo::class)->make());

        // fake products
        factory(App\Models\Product::class, 50)->create()->each(function($product) {
            $product->photos()->save(factory(Photo::class)->make());
        });
    }
}
