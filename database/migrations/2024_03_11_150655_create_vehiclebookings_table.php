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
        Schema::create('vehiclebookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('staffid');

            $table->dateTime('start_date'); //tarikh mula guna kenderaan
            $table->date('start_event_date'); //tarikh mula kursus/mesyuarat/bengkel/kursus
            $table->date('end_date'); // tarikh tamat guna kenderaan
            $table->string('destination'); // negeri acara tersebut

            $table->string('attachment')->nullable();
            $table->text('passengers');

            $table->string('progress'); // new, processing, success, cancel

            $table->foreignId('approver_id');
            $table->foreignId('clerk_id'); // the clerk user_id whom fill in this form
            $table->foreignId('cartype_id'); // vehicle type to request
            $table->foreignId('approval_id')->nullable();
            $table->foreignId('driver_id');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiclebookings');
    }
};
