<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Group extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id');
            $table->string('nama')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('group_anggota', function (Blueprint $table) {
            $table->foreignId('group_id');
            $table->foreignId('anggota_id');
            $table->primary(['group_id', 'anggota_id']);
            $table->integer('ke');
            $table->enum('status',['inactive','active']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group');
        Schema::dropIfExists('group_anggota');
    }
}
