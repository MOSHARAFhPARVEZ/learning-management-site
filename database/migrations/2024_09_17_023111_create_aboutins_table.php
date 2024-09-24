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
        Schema::create('aboutins', function (Blueprint $table) {
            $table->id();
            $table->string('instuctor_id');
            $table->string('position')->nullable();
            $table->longText('description')->nullable();
            $table->string('social_one')->nullable();
            $table->string('social_one_icon')->nullable();
            $table->longText('link_one')->nullable();
            $table->string('social_two')->nullable();
            $table->string('social_two_icon')->nullable();
            $table->longText('link_two')->nullable();
            $table->string('social_three')->nullable();
            $table->string('social_three_icon')->nullable();
            $table->longText('link_three')->nullable();
            $table->string('social_four')->nullable();
            $table->string('social_four_icon')->nullable();
            $table->longText('link_four')->nullable();
            $table->string('social_five')->nullable();
            $table->string('social_five_icon')->nullable();
            $table->longText('link_five')->nullable();
            $table->longText('bio')->nullable();
            $table->string('experience_one')->nullable();
            $table->string('experience_one_number')->nullable();
            $table->string('experience_two')->nullable();
            $table->string('experience_two_number')->nullable();
            $table->string('experience_three')->nullable();
            $table->string('experience_three_number')->nullable();
            $table->string('experience_four')->nullable();
            $table->string('experience_four_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutins');
    }
};
