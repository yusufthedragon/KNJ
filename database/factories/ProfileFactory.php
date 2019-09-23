<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {

    return [
        'deskripsi' => $faker->text,
        'sejarah' => $faker->text,
        'aktivitas' => $faker->text,
        'visi_misi' => $faker->text,
        'kepengurusan' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
