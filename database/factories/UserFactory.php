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
    return [
        'name'            => $faker->name,
        'email'           => $faker->unique()->safeEmail,
        'mobile'          => $faker->unique()->phoneNumber,
        'address'         => $faker->streetAddress . " " . $faker->city . " " . $faker->state,
        'jobTitle'        => $faker->jobTitle,
        'mobile'          => $faker->unique()->phoneNumber,
        'dateOfBirth'     => $faker->dateTimeThisCentury->format('Y-m-d'),
        'hireDate'        => $faker->dateTimeThisCentury->format('Y-m-d'),
        'profileImage'    => rand(1,10) .'.png',
        'created_at'          => date("Y-m-d H:i:s",$date),
        'updated_at'          => date("Y-m-d H:i:s",$date),
    ];
});
