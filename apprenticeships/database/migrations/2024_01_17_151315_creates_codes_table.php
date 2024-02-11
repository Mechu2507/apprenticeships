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
        Schema::create('codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('direction_id');
            $table->string('code')->nullable();
            $table->boolean('active')->default(true);
            $table->string('year')->nullable();
            $table->string('degree')->nullable();
            $table->string('mode')->nullable();
            $table->timestamps();

            $table->foreign('direction_id')->references('id')->on('directions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codes');
    }
};
