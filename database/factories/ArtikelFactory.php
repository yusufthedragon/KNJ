<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Artikel;
use Faker\Generator as Faker;

$factory->define(Artikel::class, function (Faker $faker) {

    return [
        'judul' => $faker->text,
        'deskripsi' => $faker->text,
        'wilayah' => $faker->word,
        'cover' => $faker->text,
        'gallery' => $faker->text,
        'nama_solia' => $faker->word,
        'usia' => $faker->randomDigitNotNull,
        'pekerjaan' => $faker->word,
        'alamat' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
