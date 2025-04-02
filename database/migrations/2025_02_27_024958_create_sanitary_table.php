<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('sanitary')) {
            Schema::create('sanitary', function (Blueprint $table) {
                $table->id();
                $table->string('name_of_establishment')->nullable();
                $table->string('name_of_owner')->nullable();
                $table->string('contact_number')->nullable();
                $table->string('barangay')->nullable();
                $table->string('line_of_business')->nullable();
                $table->year('renewal_year');
                $table->string('permit_code')->nullable();
                $table->timestamp('renewed_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->enum('status', ['new', 'renewal', 'close', 'inspection', 'completed'])->default('new');
                $table->boolean('confirmed')->default(false);
                $table->unsignedBigInteger('last_updated_by')->nullable();
                $table->timestamps();
            });
        }
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanitary');
    }
};
