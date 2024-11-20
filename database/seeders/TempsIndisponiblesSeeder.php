<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TempsIndisponiblesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('temps_indisponibles')->insert([
            ['date_debut' => now()->addDays(rand(1, 30)), 'date_fin' => now()->addDays(rand(31, 60)), 'heure_debut' => '08:00:00', 'heure_fin' => '18:00:00', 'terrain_id' => 1],
            ['date_debut' => now()->addDays(rand(1, 30)), 'date_fin' => now()->addDays(rand(31, 60)), 'heure_debut' => '08:00:00', 'heure_fin' => '18:00:00', 'terrain_id' => 2],
            ['date_debut' => now()->addDays(rand(1, 30)), 'date_fin' => now()->addDays(rand(31, 60)), 'heure_debut' => '08:00:00', 'heure_fin' => '18:00:00', 'terrain_id' => 3],
            ['date_debut' => now()->addDays(rand(1, 30)), 'date_fin' => now()->addDays(rand(31, 60)), 'heure_debut' => '08:00:00', 'heure_fin' => '18:00:00', 'terrain_id' => 4],
            ['date_debut' => now()->addDays(rand(1, 30)), 'date_fin' => now()->addDays(rand(31, 60)), 'heure_debut' => '08:00:00', 'heure_fin' => '18:00:00', 'terrain_id' => 5],
            ['date_debut' => now()->addDays(rand(1, 30)), 'date_fin' => now()->addDays(rand(31, 60)), 'heure_debut' => '08:00:00', 'heure_fin' => '18:00:00', 'terrain_id' => 6],
            ['date_debut' => now()->addDays(rand(1, 30)), 'date_fin' => now()->addDays(rand(31, 60)), 'heure_debut' => '08:00:00', 'heure_fin' => '18:00:00', 'terrain_id' => 7],
            ['date_debut' => now()->addDays(rand(1, 30)), 'date_fin' => now()->addDays(rand(31, 60)), 'heure_debut' => '08:00:00', 'heure_fin' => '18:00:00', 'terrain_id' => 8],
            ['date_debut' => now()->addDays(rand(1, 30)), 'date_fin' => now()->addDays(rand(31, 60)), 'heure_debut' => '08:00:00', 'heure_fin' => '18:00:00', 'terrain_id' => 9],
            ['date_debut' => now()->addDays(rand(1, 30)), 'date_fin' => now()->addDays(rand(31, 60)), 'heure_debut' => '08:00:00', 'heure_fin' => '18:00:00', 'terrain_id' => 10],
        ]);
    }
}
