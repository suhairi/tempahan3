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
        Schema::create('carmodels', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Preve, Hiace, X-Trail, Fortuner, X70, CRV, R Maxus
            $table->foreignId('carbrand_id');
            $table->foreignId('cartype_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carmodels');
    }
};
