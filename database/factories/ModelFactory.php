<?php
use App\User;
use App\Category;
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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'role_id'=>mt_rand(1,3),
        'is_active'=>$faker->boolean(),
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    $category_id=count(Category::all());
    return [
        'user_id'=>mt_rand(1,3),
        'category_id'=>mt_rand(1,$category_id),
        'title' => $faker->title,
        'body' => $faker->paragraphs(mt_rand(7,13)),
        'remember_token' => str_random(10),
    ];
});
