<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vacation;
use Faker\Generator as Faker;

$factory->define(Vacation::class, function (Faker $faker) {
    $days   = ['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday'];
    $date   = rand(1262055681,1262055681);
    return [
        'holidayDate' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'holidayName' => array_rand($days),
        'type'        => rand(0,1),
        'created_at'          => date("Y-m-d H:i:s",$date),
        'updated_at'          => date("Y-m-d H:i:s",$date),
    ];
});
