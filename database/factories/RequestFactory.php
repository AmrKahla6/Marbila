<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\VactionRequest;
use Faker\Generator as Faker;

$factory->define(VactionRequest::class, function (Faker $faker) {
    $employee = User::all()->random();
    $date   = rand(1262055681,1262055681);
    return [
        'employee_id'   => $employee,
        'vacationFrom'  => '2021-'.rand(1,12).'-'.rand(1,30),
        'vacationTo'    => '2022-'.rand(1,12).'-'.rand(1,30),
        'reason'        => $faker->text,
        'type'          => rand(0,1),
        'created_at'    => date("Y-m-d H:i:s",$date),
        'updated_at'    => date("Y-m-d H:i:s",$date),
    ];
});
