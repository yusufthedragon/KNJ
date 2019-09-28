<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFollowersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 255);
            $table->text('domisili');
            $table->string('jenis_kelamin', 20);
            $table->string('no_telepon', 20);
            $table->string('email', 255);
            $table->text('password');
            $table->integer('status_member');
            $table->text('foto');
            $table->integer('divisi_id');
            $table->string('nama_divisi', 255);
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('followers');
    }
}
