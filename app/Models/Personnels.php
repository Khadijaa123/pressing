<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnels extends Model
{
    use HasFactory;
    public $timestamps = false;

    // Nom de la table associée au modèle
    protected $table = 'personnels';

    // Les champs pouvant être remplis massivement
    protected $fillable = ["id", "nom", "prenom", "adresse", "num_tel", "email", "poste", "date_obtention"];
}
