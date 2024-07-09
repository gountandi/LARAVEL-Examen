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

    public function commande() : BelongsTo {

        return $this->belongsTo(Commande::class);

    }

    public function produit() : BelongsTo {

        return $this->belongsTo(Produit::class,"vendeur_id");

    }
}
