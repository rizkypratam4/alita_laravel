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
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('finish_good_schedule_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('wip_schedule_id')->nullable()->constrained()->onDelete('cascade');
            $table->boolean('status_production')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->time('waktu_selesai')->nullable();

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
        Schema::dropIfExists('operators');
    }
};
