<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VillesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('villes')->insert([
            ['nom' => 'Casablanca', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Fès', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Tangier', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Marrakesh', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Salé', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Meknes', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Rabat', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Oujda', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Kenitra', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Agadir', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
