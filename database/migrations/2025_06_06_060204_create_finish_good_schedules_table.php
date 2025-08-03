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
        Schema::create('finish_good_schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_number');
            $table->string('name');
            $table->string('keterangan');
            $table->integer('quantity');
            $table->integer('priority');
            $table->boolean('schedule_status')->nullable();
            $table->foreignId('area_id')->constrained();
            $table->foreignId('work_place_id')->constrained();

            $table->unsignedBigInteger('creator_id')->nullable();
            $table->unsignedBigInteger('updater_id')->nullable();

            $table->foreign('creator_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updater_id')->references('id')->on('users')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finish_good_schedules');
    }
};
