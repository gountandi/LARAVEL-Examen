<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Produit extends Model
{
    use HasFactory;

    protected $fillable=[
        'libelle',
        'prix',
        'quantite',
        'image',
        
    ];

    public function lignescomandes(): HasMany {

        return $this->hasMany(LigneCommande::class);

    }

    
}
