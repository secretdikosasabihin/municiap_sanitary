<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('sanitary_status_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sanitary_id')->constrained('sanitary')->onDelete('cascade'); // Link to sanitary table
            $table->enum('status', ['new', 'renewal', 'close', 'inspection', 'completed']); // Status change
            $table->timestamp('changed_at')->useCurrent(); // When the status changed
            $table->foreignId('changed_by')->nullable()->constrained('users')->onDelete('set null'); // Who changed it
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sanitary_status_histories');
    }
};
