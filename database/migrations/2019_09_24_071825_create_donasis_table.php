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
            $table->string('jenis', 100);
            $table->text('nama');
            $table->text('bank');
            $table->biginteger('nominal');
            $table->text('bukti');
            $table->string('no_urut_solia', 3);
            $table->text('catatan');
            $table->string('no_hp', 255);
            $table->string('email', 255);
            $table->string('tanggal', 255);
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
