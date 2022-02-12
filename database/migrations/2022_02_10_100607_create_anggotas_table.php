<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->nullable();
            $table->string('nama');
            $table->string('no_ktp')->nullable();
            $table->string('alamat');
            $table->string('telepon');
            $table->string('pekerjaan')->nullable();
            $table->dateTime('tanggal_lahir');
            $table->dateTime('tanggal_masuk')->useCurrent();
            $table->string('nama_ibu_kandung')->nullable();
            $table->enum('jenis_kelamin',['pria','wanita']);
            $table->foreignId('karyawan_id');
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}
