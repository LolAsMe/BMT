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
            $table->string('tanggal_awal');
            $table->string('tanggal_selesai');
            $table->foreignId('simpanan_id');
            $table->decimal('awal',15,2);
            $table->enum('status',["ongoing, selesai"])->default('ongoing');
            $table->decimal('jumlah',15,2)->default(0);
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
        Schema::dropIfExists('nisbah');
    }
}
