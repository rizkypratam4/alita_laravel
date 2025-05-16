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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('tanggal_perolehan');
            $table->string('supplier')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('kode_asset');
            $table->string('harga');
            $table->string('kapasitas')->nullable();
            $table->foreignId('brand_id')->nullable()->constrained();
            $table->foreignId('work_place_id')->nullable()->constrained();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->foreignId('type_id')->nullable()->constrained();
            $table->foreignId('departement_id')->nullable()->constrained();
            $table->text('keterangan')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('assets');
    }
};
