<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Decimal;

class CreatePembiayaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembiayaan', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nomor');
            $table->foreignId('jenis_pembiayaan_id');
            $table->foreignId('simpanan_id');
            $table->foreignId('karyawan_id');
            $table->dateTime('tanggal_pinjam')->useCurrent();
            $table->decimal('jumlah',10,2,true);
            $table->dateTime('tanggal_jatuh_tempo');
            $table->decimal('pokok',7,2,true);
            $table->decimal('jasa',6,2,true);
            $table->decimal('potongan_pembiayaan',7,2,true);
            $table->decimal('total_pembiayaan',10,2,true);
            $table->unsignedInteger('frekuensi_angsuran');
            $table->decimal('jumlah_angsuran',10,2,true);
            $table->decimal('angsuran_diterima',10,2,true);
            $table->string('keterangan')->nullable();
            $table->enum('status',['pending','ongoing','ongoing-telat','selesai']);
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
        Schema::dropIfExists('pembiayaan');
    }
}
