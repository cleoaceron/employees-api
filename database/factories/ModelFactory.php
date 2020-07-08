<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\Employee::class, function (Faker\Generator $faker) {
    return [
    	"uuid" => $faker->uuid,
    	"last_name" => $faker->last_name,
        "first_name" => $faker->first_name,
        "middle_name" => $faker->middle_name,
        "nick_name" => $faker->nick_name,
        "department" => $faker->department,
        "position" => $faker->position,
        "birth_date" => $faker->birth_date,
        "hired_date" => $faker->hired_date,
        "email_address" => $faker->email_address,
        "status" => $faker->status
    ];
});
