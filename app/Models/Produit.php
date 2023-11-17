<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idProduit';

    public function getPrixProduit($idFournisseur)
    {
        $prixProduit = PrixProduit::where('idProduit', $this->idProduit)
                                  ->where('idFournisseur', $idFournisseur)
                                  ->value('prix');
        return $prixProduit;
    }
}
