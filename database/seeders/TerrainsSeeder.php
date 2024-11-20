<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TerrainsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('terrains')->insert([
            
            [
                'nom' => 'Terrain maracana-foot',
                'adresse' => 'Adresse C’est un club de sport situé à Route de Sefrou, km 8,5 30023 Fès',
                'prix' => (300),
                'note' => rand(1, 5),
                'ville_id' => 1,
                'heure_debut' => '08:00:00',
                'heure_fin' => '18:00:00',
                'jour_off' => 'Sunday',
            ],
            [
                'nom' => 'Terrain Aksbi fes foot',
                'adresse' => 'Adresse Cest une académie de football située au Quartier El Merja à Fès',
                'prix' => rand(100, 500),
                'note' => rand(1, 5),
                'ville_id' => 2,
                'heure_debut' => '08:00:00',
                'heure_fin' => '18:00:00',
                'jour_off' => 'Sunday',
               
            ],
            [
                'nom' => 'Terrain maghrib sportif',
                'adresse' => 'Adresse Cest un club de sport situé à Boulevard Essaadiyine à Fès',
                'prix' => rand(100, 500),
                'note' => rand(1, 5),
                'ville_id' => 3,
                'heure_debut' => '08:00:00',
                'heure_fin' => '18:00:00',
                'jour_off' => 'Sunday',
                
            ],
            [
                'nom' => 'Terrain fes contry club',
                'adresse' => 'Adresse  Cest un club de sport situé à Complexe Sportif El Merja à Fès',
                'prix' => rand(100, 500),
                'note' => rand(1, 5),
                'ville_id' => 4,
                'heure_debut' => '08:00:00',
                'heure_fin' => '18:00:00',
                'jour_off' => 'Sunday',
            ],
            [
                'nom' => 'Terrain fes adarissa',
                'adresse' => 'Adresse  Cest un club de sport situé à hay adarissa ',
                'prix' => rand(100, 500),
                'note' => rand(1, 5),
                'ville_id' => 4,
                'heure_debut' => '08:00:00',
                'heure_fin' => '18:00:00',
                'jour_off' => 'Sunday',
            ],
           ]);
    }
}
