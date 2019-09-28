<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Divisi;
use Faker\Generator as Faker;

$factory->define(Divisi::class, function (Faker $faker) {

    return [
        'nama' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
