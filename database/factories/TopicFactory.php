<?php
namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Topic;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Topic::class, function (Faker $faker) use ($factory) {
    $user_id = $factory->create(User::class)->id;
    $title = $faker->unique()->realText(rand(10, 20));
    $isPublished = rand(1, 5) > 1;
    return [
        'title'        => $title,
        'description'  => $faker->realText($faker->numberBetween(10,200)),
        'slug' => Str::slug($title),
        'user_id' => $user_id,
        'is_published' => $isPublished,
        'view_count' => $faker->randomDigit(rand(0, 10)),
        'published_at' => $isPublished ? $faker->date('Y-m-d H:i:s') : null,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
    ];
});
