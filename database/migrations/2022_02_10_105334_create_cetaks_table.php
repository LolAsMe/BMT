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
            $table->unsignedDecimal('debit',15);
            $table->unsignedDecimal('kredit',15);
            $table->unsignedDecimal('saldo',15);
            $table->foreignId('karyawan_id')->default(0);
            $table->foreignId('simpanan_id');
            $table->unsignedInteger('no_urut')->default(1);
            $table->softDeletes();
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
