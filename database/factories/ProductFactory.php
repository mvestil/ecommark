<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Product::class, function (Faker $faker) {
    $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));

    return [
        'name'             => $faker->productName,
        'sku'              => $faker->unique()->bothify('#####????'),
        'description'      => $faker->text(100),
        'stocks_available' => $faker->randomDigit, // password
        'price'            => $faker->randomFloat(null, 1, 100),
    ];
});
