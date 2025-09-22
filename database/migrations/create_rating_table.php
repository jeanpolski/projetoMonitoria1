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
        Schema::create('rating', function (Blueprint $table) {
            $table->id();

            $table->foreignId('session_id')->constrained('session')->onDelete('cascade');
            $table->foreignId('aluno_id')->constrained('users')->onDelete('cascade');
            $table->tinyInteger('rate');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }
};