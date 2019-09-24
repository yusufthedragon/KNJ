<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Artikel;
use Faker\Generator as Faker;

$factory->define(Artikel::class, function (Faker $faker) {

    return [
        'judul' => $faker->text,
        'jenis' => $faker->word,
        'deskripsi' => $faker->text,
        'gambar' => $faker->text,
        'cover' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
