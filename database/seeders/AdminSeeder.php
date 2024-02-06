<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=   User::create([
            'name' => 'bouchehboun',
            'prenom' => 'anwar',
            'genre' => 'male',
            'cin' => 'HA191418',
            'role'=>'admin',
         'image'=>'j.png',
            'phone' => 0,
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
             'password' => '1995',
            // 'remember_token' => Str::random(10)

        ]);
    $user->assignRole('patien','admin');



    }
}