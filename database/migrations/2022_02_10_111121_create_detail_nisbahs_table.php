<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailNisbahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_nisbah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengendapan_id');
            $table->foreignId('detail_simpanan_id');
            $table->integer('pengendapan');
            $table->unsignedDecimal('hasil');
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
        Schema::dropIfExists('detail_nisbah');
    }
}
