<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{   protected $table = 'services';
    public $timestamps = false;

    protected $fillable = ['prix', 'photo', 'description', 'id_sous_categories'];

    public function sousCategorie()
    {
        return $this->belongsTo(SousCategorie::class, 'id_sous_categories');
    }
}
