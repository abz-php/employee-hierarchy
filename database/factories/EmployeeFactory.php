<?php

use Faker\Generator as Faker;

$positions = \App\Models\Catalog\Position::all();
$chiefPositions = [];
$subordinatesPositions = [];

$positions->each(function ($position) use (&$chiefPositions, &$subordinatesPositions) {
    if (mb_strpos($position->key, 'chief_') === false) array_push($subordinatesPositions, $position->key);
    else array_push($chiefPositions, $position->key);
});

$factory->define(App\Models\Employee::class, function (Faker $faker) use ($positions) {
    return [
        'first_name'        => $faker->firstName,
        'last_name'         => $faker->lastName,
        'middle_name'       => $faker->firstName,
        'position'          => $faker->randomElement($positions->pluck('key')->toArray()),
        'employment_date'   => $faker->dateTimeBetween('-5 years'),
        'income_monthly'    => rand(1, 50) * 1000,
    ];
});

$factory->state(App\Models\Employee::class, 'chief', function ($faker) use ($chiefPositions) {
    return [
        'position'          => $faker->randomElement($chiefPositions),
        'income_monthly'    => rand(40, 60) * 1000,
    ];
});

$factory->state(App\Models\Employee::class, 'subordinate', function ($faker) use ($subordinatesPositions) {
    return [
        'position'          => $faker->randomElement($subordinatesPositions),
    ];
});
