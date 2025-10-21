<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->smallInteger('sort')
                ->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery_images');
    }
};
