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
        Schema::create('health_card', function (Blueprint $table) {
            $table->id();
            $table->string('print_code')->unique()->nullable();
            $table->string('full_name')->nullable();
            $table->string('health_card_type')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('place_of_employment')->nullable();
            $table->string('designation')->nullable();
            $table->date('date_of_issuance')->nullable();
            $table->date('date_of_expiration')->nullable();
            $table->boolean('confirmed')->default(false);
            // $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_card');
    }
};
