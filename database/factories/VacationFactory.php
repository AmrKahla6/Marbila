<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vacation;
use Faker\Generator as Faker;

$factory->define(Vacation::class, function (Faker $faker) {
    $days   = array('labor Day','Eid al-Fitr','Eid al-Adha','new Year','Birth of the Prophet','Revolutionary Day','Easter');
    $key = array_rand($days);
    $date   = rand(1262055681,1262055681);
    return [
        'holidayDate' => rand(2000,2020).'-'.rand(1,12).'-'.rand(1,30),
        'holidayName' => $days[$key],
        'created_at'  => date("Y-m-d H:i:s",$date),
        'updated_at'  => date("Y-m-d H:i:s",$date),
    ];
});
