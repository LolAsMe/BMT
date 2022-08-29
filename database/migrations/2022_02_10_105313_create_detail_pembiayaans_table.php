<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPembiayaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pembiayaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembiayaan_id');
            $table->unsignedInteger('angsuran_ke',);
            $table->decimal('jumlah',13,2);
            $table->unsignedDecimal('akumulasi_angsuran',13);
            $table->unsignedDecimal('total_tanggungan',13);
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('detail_pembiayaan');
    }
}
