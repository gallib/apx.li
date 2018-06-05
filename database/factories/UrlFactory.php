<?php

use Faker\Generator as Faker;

$factory->define(\Gallib\ShortUrl\Url::class, function (Faker $faker) {
    return [
        'url' => $faker->url,
        'code' => (new \Gallib\ShortUrl\Hasher)->generate(),
    ];
});