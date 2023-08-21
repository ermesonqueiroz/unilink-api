<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appearances', function (Blueprint $table) {
            $table->id();
            $table->string('text_color');
            $table->string('background_color');
            $table->string('button_color');
            $table->string('button_text_color');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

   public function down(): void
    {
        Schema::dropIfExists('appearances');
    }
};
