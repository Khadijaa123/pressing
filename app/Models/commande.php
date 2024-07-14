<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;
    public $timestamps = false;
    // Nom de la table associée au modèle
    protected $table = 'commande';

    // Les champs pouvant être remplis massivement
    protected $fillable = ['date', 'heure', 'prix', 'adresse_livraison','specification_adresse','date_ramassage', 'num_tel','type','remarque','id_client','id_transporteur','id_panier'];
}
