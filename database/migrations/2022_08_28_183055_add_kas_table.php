<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('kas', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->decimal('jumlah',16,2,true)->default(0);
            $table->timestamps();
        });
        Schema::create('detail_kas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kas_id');
            $table->string('kode')->nullable();
            $table->dateTime('tanggal')->useCurrent();
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
        //
        Schema::dropIfExists('kas');
        Schema::dropIfExists('detail_kas');
    }
}
