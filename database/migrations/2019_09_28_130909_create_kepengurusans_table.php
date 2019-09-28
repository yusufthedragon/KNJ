<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKepengurusansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepengurusans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 255);
            $table->string('jabatan', 255);
            $table->text('pendapat');
            $table->text('foto');
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
        Schema::drop('kepengurusans');
    }
}
