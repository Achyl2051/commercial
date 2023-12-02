<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entre extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idEntre';
    protected $fillable = ['idEntre', 'idProduit', 'idMagasin','date','quantite','prixUnitaire'];
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'idProduit', 'idProduit');
    }
    public function magasin()
    {
        return $this->belongsTo(Magasin::class, 'idMagasin', 'idMagasin');
    }
}
