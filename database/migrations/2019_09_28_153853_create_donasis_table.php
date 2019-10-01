<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonasisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 255);
            $table->string('bank', 255);
            $table->date('tanggal_transfer');
            $table->text('bukti_transfer');
            $table->biginteger('nominal');
            $table->string('jenis_donasi', 20);
            $table->string('no_telepon', 255);
            $table->string('email', 255);
            $table->integer('user_id')->nullable();
            $table->text('catatan')->nullable();
            $table->text('daftar_solia')->nullable();
            $table->integer('project_id')->nullable();
            $table->text('nama_project')->nullable();
            $table->integer('status_persetujuan')->default(0);
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
        Schema::drop('donasis');
    }
}
