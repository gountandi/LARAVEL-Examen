<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LigneCommande extends Model
{
    use HasFactory;
    protected $fillable=[
        'quantite',
        'cmd_id',
        'prod_id',
        
    ];

    protected $table='lignes_commandes';

    public function commande() : BelongsTo {

        return $this->belongsTo(Commande::class, "cmd_id");

    }

    public function produit() : BelongsTo {

        return $this->belongsTo(Produit::class,"prod_id");

    }

    public function calculateAmount(){
        return 0;
    }

    protected static function booted(): void
    {
        static::created(function (LigneCommande $lignecommande) {
            $lignecommande->commande->montant+=$lignecommande->quantite*$lignecommande->produit->prix;;
            $lignecommande->commande->save();
            // ...
        });
        // static::updated(function (LigneCommande $lignecommande) {
        //     $lignecommande->commande->montant+=$lignecommande->quantite*$lignecommande->produit->prix;;
        //     $lignecommande->commande->save();
        //     // ...
        // });
    }
}
