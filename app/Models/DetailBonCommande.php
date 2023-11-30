<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBonCommande extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['idBonCommande', 'idProduit', 'quantite','prixUnitaire','tva'];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'idProduit', 'idProduit');
    }
    
    public function detailsByBonCommande($idBonCommande)
    {
        return $this->where('idBonCommande', $idBonCommande)->get();
    }
}