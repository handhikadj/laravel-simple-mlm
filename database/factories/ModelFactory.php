<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

/* @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Peserta::class, function (Faker\Generator $faker) {
    return [
        'promotor_id' => function() {
        	return factory(App\Promotor::class)->create()->id;
        },
        'no_peserta' => randomString(),
        'nama_peserta' => $faker->name
    ];
});

/* @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Promotor::class, function (Faker\Generator $faker) {
    return [
        'nama_promotor'    => $faker->name,
    ];
});

function randomString()
{
    $huruf = generateRandomString(1);
    $angka = generateRandomInteger(7);
    return $huruf . $angka;
}



