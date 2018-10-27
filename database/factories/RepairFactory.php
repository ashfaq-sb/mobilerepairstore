<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Repair::class, function (Faker $faker) {
    return [
      'brand' => $faker->word,
      'model' => $faker->word,
      'imei' => $faker->randomNumber($nbDigits = NULL, $strict = false),
      'type' => $faker->word,
      'discription' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'parts' => $faker->word,
      'status' => $faker->numberBetween($min=0, $max=1),
      'price' => $faker->numberBetween($min=20, $max=100),
      'customer_id' => $faker->numberBetween($min=1, $max=40),

    ];
});
