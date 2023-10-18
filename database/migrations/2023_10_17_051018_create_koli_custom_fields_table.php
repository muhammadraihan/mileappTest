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
        Schema::create('koli_custom_fields', function (Blueprint $table) {
            $table->id();
            $table->string('koli_id');
            $table->string('awb_sicepat')->nullable();
            $table->string('harga_barang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koli_custom_fields');
    }
};
