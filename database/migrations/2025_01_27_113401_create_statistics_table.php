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
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('total_population')->default(0);
            $table->integer('total_families')->default(0);
            $table->integer('total_males')->default(0);
            $table->integer('total_females')->default(0);
            $table->integer('islam')->default(0);
            $table->integer('christian')->default(0);
            $table->integer('catholic')->default(0);
            $table->integer('hindu')->default(0);
            $table->integer('buddha')->default(0);
            $table->integer('konghucu')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
