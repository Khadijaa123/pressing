<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporteur extends Model
{
    use HasFactory;
    public $timestamps = false;

    // Nom de la table associée au modèle
    protected $table = 'transporteur';

    // Les champs pouvant être remplis massivement
    protected $fillable = ["id", "id_personel"];
    public function personnel()
    {
        return $this->belongsTo(Personnels::class, 'id_personel');
    }
}
