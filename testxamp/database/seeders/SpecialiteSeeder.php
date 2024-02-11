<?php

namespace Database\Seeders;

use App\Models\Specialite;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpecialiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Specialite::insert([
            ['specialite' => 'Médecine interne'],
            ['specialite' => 'Médecine familiale'],
            ['specialite' => 'Médecine d\'urgence'],
            ['specialite' => 'Médecine du travail'],
            ['specialite' => 'Médecine communautaire'],
        ]);

    }
}
