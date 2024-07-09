<?php

namespace Database\Seeders;

use App\Models\Produit;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'nabila',
            'email' => 'ngountandi@gmail.com',
            'password'=>Hash::make("123456789"),
        ]);

        Produit::factory()->count(10)->create();
    }
}
