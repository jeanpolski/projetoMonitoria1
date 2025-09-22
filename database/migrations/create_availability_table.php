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
        Schema::create('availability', function (Blueprint $table) {
            $table->id();
            $table->foreignId('monitor_id')->constrained('users')->onDelete('cascade');
            $table->string('dia_semana');
            $table->time('hora_inicio');
            $table->time('hora_fim');
            $table->timestamps();
        });
    }
};