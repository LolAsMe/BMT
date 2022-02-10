<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNisbahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nisbah', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('bulan');
            $table->foreignId('simpanan_id');
            $table->decimal('pengendapan');
            $table->decimal('tabungan');
            $table->decimal('nisbah');
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
        Schema::dropIfExists('nisbah');
    }
}
