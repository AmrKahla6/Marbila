<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Request;
use Faker\Generator as Faker;

$factory->define(Request::class, function (Faker $faker) {
    $employee = User::all()->random();
    $date   = rand(1262055681,1262055681);
    return [
        'employee_id'   => $employee,
        'vacationFrom'  => $faker->dateTimeThisCentury->format('Y-m-d'),
        'vacationTo'    => $faker->dateTimeThisCentury->format('Y-m-d'),
        'reason'        => $faker->text,
        'created_at'          => date("Y-m-d H:i:s",$date),
        'updated_at'          => date("Y-m-d H:i:s",$date),
    ];
});
