<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemohons', function (Blueprint $table) {
            $table->id();
            $table->text('tujuan');
            $table->string('nama');
            $table->bigInteger('nik');
            $table->string('email');
            $table->string('divisi');
            $table->string('grup');
            $table->string('kebutuhan');
            $table->string('akses');
            $table->string('koneksiAplikasi');
            $table->date('mulai');
            $table->date('sampai');
            $table->text('ipSource');
            $table->text('ipDestination');
            $table->text('port');
            $table->string('initiateConnection');
            $table->string('lampiran');
            $table->date('waktuPermohonan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemohons');
    }
};
