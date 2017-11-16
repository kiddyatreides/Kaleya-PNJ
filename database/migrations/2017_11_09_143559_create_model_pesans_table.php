<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelPesansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode');
            $table->integer('acara_id')->unsigned();
            $table->integer('pengirim_id')->unsigned();
            $table->integer('penerima_id')->unsigned();
            $table->text('pesan');
            $table->text('lampiran')->nullable();
            $table->text('url_lampiran')->nullable();
            $table->timestamps();
            $table->foreign('kode')->references('kode')->on('pesan_header');
            $table->foreign('acara_id')->references('id')->on('acara');
            $table->foreign('pengirim_id')->references('id')->on('users');
            $table->foreign('penerima_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesan');
    }
}
