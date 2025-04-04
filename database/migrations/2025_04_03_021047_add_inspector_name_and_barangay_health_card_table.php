<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('health_card', function (Blueprint $table) {
            $table->string('inspector_name')->after('date_of_expiration')->nullable();
            $table->string('barangay')->after('inspector_name')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('health_card', function (Blueprint $table) {
            $table->dropColumn(['inspector_name', 'barangay']);
        });
    }
};

