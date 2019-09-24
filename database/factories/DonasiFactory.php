<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Donasi;
use Faker\Generator as Faker;

$factory->define(Donasi::class, function (Faker $faker) {

    return [
        'jenis' => $faker->word,
        'nama' => $faker->text,
        'bank' => $faker->text,
        'nominal' => $faker->word,
        'bukti' => $faker->text,
        'no_urut_solia' => $faker->randomDigitNotNull,
        'catatan' => $faker->text,
        'no_hp' => $faker->word,
        'email' => $faker->word,
        'tanggal' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
