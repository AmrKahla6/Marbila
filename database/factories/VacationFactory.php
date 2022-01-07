<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vacation;
use Faker\Generator as Faker;

$factory->define(Vacation::class, function (Faker $faker) {
    $days   = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
    $key = array_rand($days);
    $date   = rand(1262055681,1262055681);
    return [
        'holidayDate' => rand(2000,2020).'-'.rand(1,12).'-'.rand(1,30),
        'holidayName' => $days[$key],
        'type'        => rand(0,1),
        'created_at'  => date("Y-m-d H:i:s",$date),
        'updated_at'  => date("Y-m-d H:i:s",$date),
    ];
});
