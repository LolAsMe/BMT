<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSimpanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_simpanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('simpanan_id');
            $table->string('kode')->nullable();
            $table->foreignId('transaksi_id')->nullable();
            $table->dateTime('tanggal_transaksi')->useCurrent();
            $table->dateTime('tanggal_slip')->useCurrent();
            $table->decimal('debit',12,2,true)->default(0);
            $table->decimal('kredit',12,2,true)->default(0);;
            $table->decimal('saldo_awal',15,2,true);
            $table->decimal('saldo_akhir',15,2,true);
            $table->string('keterangan')->nullable();
            $table->foreignId('karyawan_id')->default(1);
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
        Schema::dropIfExists('detail_simpanan');
    }
}
