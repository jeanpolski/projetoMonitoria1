<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('subject')->insert([
            [
                'name' => 'Matemática Discreta',
                'description' => 'Estudo de números, equações e funções',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Inglês',
                'description' => 'Estudo da escrita e fala inglesa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Engenharia de Software',
                'description' => 'Estudo da modelagem, planejamento e arquitetura de um software.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
