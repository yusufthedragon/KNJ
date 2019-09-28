<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {

    return [
        'judul' => $faker->text,
        'deskripsi' => $faker->text,
        'cover' => $faker->text,
        'kode_donasi' => $faker->word,
        'daftar_solia' => $faker->text,
        'timeline' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
