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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('crs_code');
            $table->string('crs_title');
            $table->longText('crs_outline')->nullable();
            // $table->bigInteger('teacher_id')->unsigned();
            // $table->timestamp('started_at')->nullable();
            // $table->timestamp('finished_at')->nullable();
            // $table->enum('status', ['enabled', 'disabled'])->default('enabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
