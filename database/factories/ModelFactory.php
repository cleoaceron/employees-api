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
    	"last_name" => $faker->lastName,
        "first_name" => $faker->firstName,
        "middle_name" => $faker->word,
        "nick_name" => $faker->word,
        "department" => $faker->word,
        "position" => $faker->word,
        "birth_date" => $faker->date,
        "hired_date" => $faker->date,
        "email_address" => $faker->email,
        "status" => $faker->randomDigit
    ];
});
