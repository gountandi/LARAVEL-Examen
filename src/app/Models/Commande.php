<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Commande extends Model
{
    use HasFactory;

    protected $fillable=[
        'client',
        'montant',                         
        'user_id',
        'date',
    ];

    

    public function user() : BelongsTo {

        return $this->belongsTo(User::class);

    }

    public function lignescomandes(): HasMany {

        return $this->hasMany(LigneCommande::class);

    }

    protected function casts(): array
    {
        return [
            'date' => 'datetime',
        ];
    }
}
