<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Donasi;
use Faker\Generator as Faker;

$factory->define(Donasi::class, function (Faker $faker) {

    return [
        'nama' => $faker->word,
        'bank' => $faker->word,
        'tanggal_transfer' => $faker->word,
        'bukti_transfer' => $faker->text,
        'nominal' => $faker->word,
        'no_telepon' => $faker->word,
        'email' => $faker->word,
        'catatan' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
