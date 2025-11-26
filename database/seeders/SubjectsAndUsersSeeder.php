<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Subject;

class SubjectsAndUsersSeeder extends Seeder
{
    public function run(): void
    {
        $math = Subject::create([
            'name' => 'Matemática',
            'description' => 'Matemática básica e avançada.'
        ]);

        $physics = Subject::create([
            'name' => 'Física',
            'description' => 'Conceitos de mecânica, óptica e termodinâmica.'
        ]);

        $chemistry = Subject::create([
            'name' => 'Química',
            'description' => 'Química geral e orgânica.'
        ]);

        User::create([
            'name' => 'Monitor de Matemática',
            'email' => 'monitor.matematica@example.com',
            'password' => Hash::make('password123'),
            'role' => 'monitor',
            'subject_id' => $math->id,
        ]);

        User::create([
            'name' => 'Monitor de Física',
            'email' => 'monitor.fisica@example.com',
            'password' => Hash::make('password123'),
            'role' => 'monitor',
            'subject_id' => $physics->id,
        ]);

        User::create([
            'name' => 'Monitor de Química',
            'email' => 'monitor.quimica@example.com',
            'password' => Hash::make('password123'),
            'role' => 'monitor',
            'subject_id' => $chemistry->id,
        ]);

        User::create([
            'name' => 'Aluno 1',
            'email' => 'aluno1@example.com',
            'password' => Hash::make('password123'),
            'role' => 'aluno'
        ]);

        User::create([
            'name' => 'Aluno 2',
            'email' => 'aluno2@example.com',
            'password' => Hash::make('password123'),
            'role' => 'aluno'
        ]);
    }
}
