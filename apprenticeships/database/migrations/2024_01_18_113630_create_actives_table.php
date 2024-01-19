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
        Schema::create('actives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code_id');
            $table->string('name');
            $table->string('last_name');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('company_person');
            $table->string('position');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('supervisor_name');
            $table->integer('hours');
            $table->boolean('generated')->default(false);
            $table->timestamps();
        
            $table->foreign('code_id')->references('id')->on('codes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actives');
    }
};
