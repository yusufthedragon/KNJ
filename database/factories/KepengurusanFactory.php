<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Kepengurusan;
use Faker\Generator as Faker;

$factory->define(Kepengurusan::class, function (Faker $faker) {

    return [
        'nama' => $faker->word,
        'jabatan' => $faker->word,
        'pendapat' => $faker->text,
        'foto' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
