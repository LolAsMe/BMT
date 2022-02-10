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
            $table->foreignId('transaksi_id');
            $table->dateTime('tanggal_transaksi')->useCurrent();
            $table->dateTime('tanggal_slip')->useCurrent();
            $table->decimal('debit',9,2,true)->default(0);
            $table->decimal('kredit',9,2,true)->default(0);;
            $table->decimal('saldo_awal',10,2,true);
            $table->decimal('saldo_akhir',10,2,true);
            $table->string('keterangan')->nullable();
            $table->foreignId('karyawan_id');
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
