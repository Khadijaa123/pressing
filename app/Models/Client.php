<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    public $timestamps = false;

    // Nom de la table associée au modèle
    protected $table = 'client';

    // Les champs pouvant être remplis massivement
    protected $fillable = ['nom', 'prenom', 'ville', 'num_tel', 'email', 'username', 'pwd'];
}