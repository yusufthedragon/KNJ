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
            $table->integer('jenis_donasi');
            $table->string('no_telepon', 255);
            $table->string('email', 255);
            $table->text('catatan');
            $table->text('daftar_solia');
            $table->integer('project_id');
            $table->text('nama_project');
            $table->integer('status_persetujuan');
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
