<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Commande;
use App\Models\Produit;

use App\Models\LigneCommande;

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

        $vendeur1= User::create([
            'name' => 'nabilla',
            'email' => 'nlgountandi@gmail.com',
            'password'=>Hash::make("123456789"),
        ]);

        $Commande1=Commande::create([
            "vendeur_id"=>$vendeur1->id,
            "client"=>"client1"
        ]);

        $Commande2=Commande::create([
            "vendeur_id"=>$vendeur1->id,
            "client"=>"client2"
        ]);

        

        LigneCommande::create([
            "quantite"=>2,
            "cmd_id"=>$Commande1->id,
            "prod_id"=>4,
        ]);

        LigneCommande::create([
            "quantite"=>2,
            "cmd_id"=>$Commande1->id,
            "prod_id"=>3,
        ]);

        LigneCommande::create([
            "quantite"=>2,
            "cmd_id"=>$Commande1->id,
            "prod_id"=>1,
        ]);

        LigneCommande::create([
            "quantite"=>2,
            "cmd_id"=>$Commande2->id,
            "prod_id"=>8,
        ]);

        LigneCommande::create([
            "quantite"=>2,
            "cmd_id"=>$Commande2->id,
            "prod_id"=>10,
        ]);

        LigneCommande::create([
            "quantite"=>2,
            "cmd_id"=>$Commande2->id,
            "prod_id"=>5,
        ]);

    }
}
