<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('monitor_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('monitor_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('aluno_id')->constrained('users')->onDelete('cascade');
            $table->date('data');
            $table->time('hora_inicio');
            $table->time('hora_fim');
            $table->enum('status', ['PENDENTE', 'CONFIRMADA', 'CANCELADA', 'CONCLUIDA'])->default('PENDENTE');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
