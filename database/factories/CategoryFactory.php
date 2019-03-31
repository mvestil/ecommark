<?php

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));

    return [
        'name'        => $faker->department,
        'description' => $faker->text(20)
    ];
});
