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
        Schema::create('quans', function (Blueprint $table) {
            $table->id();
            $table->integer('instructor_id');
            $table->integer('course_id');
            $table->integer('user_id');
            $table->string('subject');
            $table->longText('question');
            $table->integer('parent_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quans');
    }
};
