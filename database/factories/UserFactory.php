<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\category;
use App\city;
use App\User;
use App\flyer;
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
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('12345678'), // password
        'remember_token' => Str::random(10),
        'phone'=>'0'.rand(1000000000,1299999999),
    ];
});
$factory->define(category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
$factory->define(city::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
    ];
});
$factory->define(flyer::class, function (Faker $faker) {
    return [
        'category_id' => category::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'city_id' => city::all()->random()->id,
        'address'=>$faker->address,
        'description'=>$faker->text(400),
        'price'=>rand(200000,4000000),
        'area'=>rand(50,500),
        'image'=>'["15798662701.jpg","15798662702.jpg","15798662703.jpg","1579866270h.jpg"]',
        'contract'=>'sell',
    ];
});

