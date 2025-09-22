<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Monitores
        User::create([
            'name' => 'Monitor 1',
            'email' => 'monitor1@example.com',
            'password' => Hash::make('password123'),
            'role' => 'monitor',
        ]);

        User::create([
            'name' => 'Monitor 2',
            'email' => 'monitor2@example.com',
            'password' => Hash::make('password123'),
            'role' => 'monitor',
        ]);

        // Alunos
        User::create([
            'name' => 'Aluno 1',
            'email' => 'aluno1@example.com',
            'password' => Hash::make('password123'),
            'role' => 'aluno',
        ]);

        User::create([
            'name' => 'Aluno 2',
            'email' => 'aluno2@example.com',
            'password' => Hash::make('password123'),
            'role' => 'aluno',
        ]);
    }
}

