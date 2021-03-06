<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelAcarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acara', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('judul');
            $table->text('deskripsi');
            $table->text('foto');
            $table->text('urlfoto');
            $table->datetime('tanggal_mulai');
            $table->datetime('tanggal_berakhir');
            $table->text('alamat');
            $table->string('harga_tiket');
            $table->string('jumlah_tiket');
            $table->string('statusSponsor')->comment('1 iya 0 tidak')->default(0);
            $table->string('statusMediaPartner')->comment('1 iya 0 tidak')->default(0);
            $table->string('statusOpenBooth')->comment('1 iya 0 tidak')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acara');
    }
}
