<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
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
            $table->string('nama', 150);
            $table->string('sex', 20);
            $table->string('agama', 20);
            $table->text('alamat');
            $table->string('telepon', 15);
            $table->foreignId('jabatan_id')->constrained('jabatan')->onDelete('cascade');
            $table->foreignId('devisi_id')->constrained('devisi')->onDelete('cascade');
            $table->foreignId('sektor_id')->constrained('sektor')->onDelete('cascade');
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
        Schema::dropIfExists('anggota');
    }
}
