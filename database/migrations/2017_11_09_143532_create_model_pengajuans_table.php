<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelPengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('acara_id')->unsigned();
            $table->text('pesan');
            $table->string('lampiran')->comment('file proposal');
            $table->string('tipePengajuan')->comment('1 sponsor 2 media partner 3 booth');
            $table->string('statusPengajuan')->comment('1 pending 2 sedang dicek 3 diterima');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('acara_id')->references('id')->on('acara');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan');
    }
}
