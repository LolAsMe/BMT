<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailLabasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_laba', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laba_id');
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
        Schema::dropIfExists('detail_laba');
    }
}
