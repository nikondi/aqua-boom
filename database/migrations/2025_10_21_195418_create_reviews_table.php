<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('rate');
            $table->string('name');
            $table->string('text');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
