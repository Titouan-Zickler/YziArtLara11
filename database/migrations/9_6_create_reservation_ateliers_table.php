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
        Schema::create('reservation_ateliers', function (Blueprint $table) {
            $table->timestamps();

            $table->primary(['user_id','atelier_id']);


            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('atelier_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_ateliers');
    }
};
