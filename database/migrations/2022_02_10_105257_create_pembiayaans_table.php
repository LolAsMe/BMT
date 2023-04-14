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
            $table->decimal('jumlah',12,2,true);
            $table->dateTime('tanggal_jatuh_tempo');
            $table->decimal('pokok',12,2,true);
            $table->decimal('jasa',12,2,true);
            $table->decimal('potongan_pembiayaan',12,2,true);
            $table->decimal('total_pembiayaan',12,2,true);
            $table->unsignedInteger('frekuensi_angsuran');
            $table->decimal('jumlah_angsuran',12,2,true);
            $table->decimal('angsuran_diterima',12,2,true)->default(0);
            $table->string('keterangan')->nullable();
            $table->enum('status',['pending','ongoing','ongoing-telat','selesai'])->default('pending');
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
        Schema::dropIfExists('pembiayaan');
    }
}
