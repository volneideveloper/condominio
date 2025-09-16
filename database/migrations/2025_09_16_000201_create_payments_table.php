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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->decimal('amount', 10, 2)->default(0);
            $table->date('payment_date')->nullable();
            $table->date('due_date');
            $table->foreignId('system_status_id')->constrained( 'system_status');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('condominium_id')->constrained('condominiums');
            $table->string('payment_slip')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
