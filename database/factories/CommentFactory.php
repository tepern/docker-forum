<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\Models\Topic;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) use ($factory) {
    $user_id = $factory->create(User::class)->id;
    $topic_id = $factory->create(Topic::class)->id;
    $isPublished = rand(1, 5) > 1;
    return [
        'topic_id' => $topic_id,
        'content'  => $faker->realText($faker->numberBetween(10,200)),
        'user_id' => $user_id,
        'is_published' => $isPublished,
        'published_at' => $isPublished ? $faker->date('Y-m-d H:i:s') : null,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
    ];
});
