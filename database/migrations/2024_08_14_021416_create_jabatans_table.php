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
        Schema::create('jabatans', function (Blueprint $table) {
            $table->id();
            $table->integer('mulai_tahun');
            $table->integer('selesai_tahun');
            $table->string('unit');
            $table->string('jabatan');
            $table->string('keterangan')->nullable();
            $table->foreignUuid('alumni_id')
                ->nullable()
                ->constrained('alumnis')
                ->nullOnDelete()
                ->noActionOnUpdate();
            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->noActionOnUpdate();
            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->noActionOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jabatans');
    }
};
