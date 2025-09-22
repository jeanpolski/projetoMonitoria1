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
        Schema::create('monitoria_availability', function (Blueprint $table) {
            $table->id();

            $table->foreignId('monitor_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subject')->onDelete('cascade');
            $table->timestamps();
        });
    }
};