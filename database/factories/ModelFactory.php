<?php
// require the Faker autoloader
require_once 'vendor/fzaninotto/faker/src/autoload.php';
// alternatively, use another PSR-0 compliant autoloader (like the Symfony2 ClassLoader for instance)

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();
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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Building::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween($min = 0, $max = 9000),
        'rent' => $faker->numberBetween($min = 0, $max = 1),
        'square' => $faker->numberBetween($min = 100000, $max = 900900),
        'type' => $faker->numberBetween($min = 0, $max = 3),
        'roomNumber' => $faker->numberBetween($min = 0, $max = 20),
        'codePostalMaroc' => 1005,
        'lang' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 50, $max = 70),
        'lat' => $faker->randomFloat($nbMaxDecimals = NULL, $min = -10, $max = 10),
        'status' => 1,
        'smallDisc' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        'largDisc' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
        'tags' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        'created_at' => date('Y-m-d H:i:s'),
        'user_id' => 1
    ];
});


$factory->define(App\Contact::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->email ,
        'phoneNumber' => $faker->e164PhoneNumber,
        'subject' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        'message' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
        'view' => 0,
        'type' => $faker->numberBetween($min = 0, $max = 3),
        'reply' => 0,
        'deleted' => 0,
        'created_at' => date('Y-m-d H:i:s'),
    ];
});

$factory->define(App\Reply::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'contact_id' => 1,
        'subject' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        'message' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
        'confirmed' => 0,
        'deleted' => 0,
        'user_id' => 1,
        'created_at' => date('Y-m-d H:i:s'),
    ];
});
