<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->string('keterangan');
            $table->decimal('debit',15,2,true)->default(0);
            $table->decimal('kredit',15,2,true)->default(0);;
            $table->dateTime('tanggal_transaksi')->useCurrent();
            $table->dateTime('tanggal_slip')->useCurrent();
            $table->foreignId('karyawan_id')->default(1);
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
        Schema::dropIfExists('transaksi');
    }
}
