<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('print_codes', function (Blueprint $table) {
            $table->id();
            $table->string('permit_code')->unique();
            $table->year('year');
            $table->integer('sequence');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('print_codes');
    }
};

