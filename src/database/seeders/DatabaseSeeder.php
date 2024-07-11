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
        

        Produit::factory()->count(10)->create();
        $this->call([
            CommandeSeeder::class,
        ]);
     

    }
}
