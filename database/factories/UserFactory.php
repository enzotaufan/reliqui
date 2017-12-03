<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => 'David H. Sianturi',
        'email' => 'davidhasiholans@gmail.com',
        'password' => $password ?: $password = bcrypt('secret=001'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Patient\Patient::class, function () {
    return [
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'register_from' => 'command'
    ];
});
