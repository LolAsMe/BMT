<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCetaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cetak', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->dateTime('tanggal')->useCurrent();
            $table->string('sandi');
            $table->unsignedDecimal('debit');
            $table->unsignedDecimal('kredit');
            $table->unsignedDecimal('saldo');
            $table->foreignId('karyawan_id');
            $table->foreignId('simpanan_id');
            $table->unsignedInteger('no_urut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cetak');
    }
}
