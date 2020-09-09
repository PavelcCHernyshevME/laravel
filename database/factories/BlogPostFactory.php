<?php

use Faker\Generator as Faker;

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

$factory->define(App\Models\BlogPost::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3, 8), true);
    $text = $faker->realText(rand(1000, 4000));
    $isPublish = rand(1, 5) > 1;
    $createdAt = $faker->dateTimeBetween('-3 month', '-2 month');
    $data =  [
        'category_id' => rand(1, 10),
        'user_id' => (rand(1, 5) == 5 ? 1 : 2),
        'title' => $title,
        'slug' => str_slug($title),
        'excerpt' => $faker->text(rand(40, 100)),
        'content_raw' => $text,
        'content_html' => $text,
        'is_published' => $isPublish,
        'published_at' => $isPublish ? $faker->dateTimeBetween('-2 month', '-1 days') : null,
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
    return $data;
});
