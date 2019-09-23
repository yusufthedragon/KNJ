<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'adminknj@yopmail.com',
            'role_id' => '1',
            'email_verified_at' => now(),
            'password' => '$2y$10$bi1y1gWudPBxAIx3ZiXeXuImnF7zDWf.sKMb3C9zbu4Dn4QX5A9KO',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
