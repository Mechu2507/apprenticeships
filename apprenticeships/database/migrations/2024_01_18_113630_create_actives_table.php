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
            $table->unsignedBigInteger('state_id')->default(1);
            $table->string('MrMs');
            $table->string('student_name');
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_person')->nullable();
            $table->string('position')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('supervisor_name')->nullable();
            $table->integer('hours')->nullable();
            $table->boolean('generated')->default(false);
            $table->timestamps();
        
            $table->foreign('code_id')->references('id')->on('codes')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
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
