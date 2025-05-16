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
        Schema::create('work_places', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->constrained();
            $table->string('name');
            $table->text('address');
            $table->time('opening_hours')->nullable();
            $table->time('closing_hours')->nullable();
            $table->boolean('comforta')->default(false)->nullable();
            $table->boolean('therapedic')->default(false)->nullable();
            $table->boolean('spring_air')->default(false)->nullable();
            $table->boolean('super_fit')->default(false)->nullable();
            $table->boolean('isleep')->default(false)->nullable();
            $table->boolean('sleep_spa')->default(false)->nullable();
            $table->string('category')->nullable();
            $table->string('image')->nullable();

            $table->unsignedBigInteger('creator_id')->nullable();
            $table->unsignedBigInteger('updater_id')->nullable();
            $table->timestamps();

            $table->foreign('creator_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updater_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_places');
    }
};
