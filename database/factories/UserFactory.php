<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    $date   = rand(1262055681,1262055681);
    $date   = rand(1262055681,1262055681);
    // $dateOfBirth = $faker->dateTimeThisCentury->format('Y-m-d');
    return [
        'name'            => $faker->name,
        'email'           => $faker->unique()->safeEmail,
        'mobile'          => $faker->unique()->phoneNumber,
        'address'         => $faker->streetAddress . " " . $faker->city . " " . $faker->state,
        'jobTitle'        => $faker->jobTitle,
        'mobile'          => $faker->unique()->phoneNumber,
        'dateOfBirth'     => rand(1960,1980).'-'.rand(1,12).'-'.rand(1,30),
        'hireDate'        => rand(2000,2020).'-'.rand(1,12).'-'.rand(1,30),
        'profileImage'    => '1.png',
        'created_at'      => date("Y-m-d H:i:s",$date),
        'updated_at'      => date("Y-m-d H:i:s",$date),
    ];
});
