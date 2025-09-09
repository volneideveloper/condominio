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
        Schema::create('condominiums', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('uf')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('city')->nullable();
            $table->integer('system_status_id')->nullable();
            $table->string('condominium_image')->nullable(); // <- adiciona a imagem
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('condominiums');
    }
};
