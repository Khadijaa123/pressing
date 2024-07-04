<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SousCategorie extends Model
{
    protected $table = 'sous_categories';
    protected $fillable = ['nom', 'id_categorie', 'photo', 'description'];
    public $timestamps = false; // Add this line to disable timestamps
    
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class, 'id_sous_categories');
    }
}
