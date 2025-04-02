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
        Schema::create('deaths', function (Blueprint $table) {
            $table->id();
            $table->string('province')->nullable();
            $table->string('municipality')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('sex')->nullable();
            $table->date('date_of_death')->nullable();
            $table->dateTime('birthdate')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('place_of_death')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('religion')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('residence')->nullable();
            $table->string('occupation')->nullable();
            $table->string('name_of_father')->nullable();
            $table->string('name_of_mother')->nullable();
            $table->string('cause_of_death_a')->nullable();
            $table->string('cause_of_death_b')->nullable();
            $table->string('cause_of_death_c')->nullable();
            $table->string('doctor')->nullable();
            $table->string('doctor_position')->nullable();
            $table->string('address')->nullable();
            $table->date('date')->nullable();
            $table->string('reviewed_position')->nullable();
            $table->string('reviewed_by')->nullable();
            $table->string('informant_name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('informant_address')->nullable();
            $table->string('prepared_by_name')->nullable();
            $table->string('prepared_by_position')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('death');
    }
};
