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
        Schema::create('koli_datas', function (Blueprint $table) {
            $table->id();
            $table->string('koli_length');
            $table->string('awb_url');
            $table->string('koli_chargeable_weight');
            $table->string('koli_width');
            $table->json('koli_surcharge')->nullable();
            $table->string('koli_height');
            $table->longText('koli_description');
            $table->uuid('koli_formula_id')->nullable();
            $table->uuid('connote_id');
            $table->string('koli_volume');
            $table->string('koli_weight');
            $table->uuid('koli_id');
            $table->string('koli_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koli_datas');
    }
};
