<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('sanitary', function (Blueprint $table) {
            $table->string('inspector_name')->nullable()->after('last_updated_by');
         
        });
    }

    public function down()
    {
        Schema::table('sanitary', function (Blueprint $table) {
            $table->dropColumn(['inspector_name']);
        });
    }
};

