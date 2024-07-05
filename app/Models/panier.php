<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    
    // Nom de la table associée au modèle
    protected $table = 'panier';

    // Les champs pouvant être remplis massivement
    protected $fillable = [
        'date_panier',
        'heure_panier'
    ];

    // Disable timestamps
    public $timestamps = false;
}
