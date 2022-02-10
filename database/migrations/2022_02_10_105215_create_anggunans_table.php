<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggunan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembiayaan_id');
            $table->string('kode')->nullable();
            $table->string('jenis_objek');
            $table->string('nomer_polisi')->nullable();
            $table->dateTime('tanggal_masuk')->useCurrent();
            $table->dateTime('tanggal_ambil')->nullable();
            $table->string('tahun_pembuatan')->nullable();
            $table->string('luas_objek')->nullable();
            $table->string('letak_objek')->nullable();
            $table->string('nama_pemilik');
            $table->string('alamat_pemilik');
            $table->foreignId('karyawan_id')->nullable();
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
        Schema::dropIfExists('anggunan');
    }
}
