<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'name' => $faker->catchPhrase,
        'picture_url' => '.',
        'location' =>$faker->address,
        'description' => $faker->sentence,
        'date_start' =>$faker->dateTimeThisMonth($max = 'now', $timezone = 'Asia/Beijing'),
        'date_end' =>$faker->dateTimeThisMonth($max = 'now +7 days', $timezone = 'Asia/Beijing'),
    ];
});
