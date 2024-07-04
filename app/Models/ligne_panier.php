<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ligne_panier extends Model
{
    use HasFactory;
    public $timestamps = false;

    // Nom de la table associée au modèle
    protected $table = 'ligne_panier';

    // Les champs pouvant être remplis massivement
    protected $fillable = ['quantite','id_service','id_panier'];
   
    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }
}
