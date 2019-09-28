<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Followers;
use Faker\Generator as Faker;

$factory->define(Followers::class, function (Faker $faker) {

    return [
        'nama' => $faker->word,
        'domisili' => $faker->text,
        'jenis_kelamin' => $faker->word,
        'no_telepon' => $faker->word,
        'email' => $faker->word,
        'password' => $faker->text,
        'status_member' => $faker->word,
        'foto' => $faker->text,
        'divisi_id' => $faker->word,
        'nama_divisi' => $faker->word,
        'tanggal_lahir' => $faker->word,
        'alamat' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
