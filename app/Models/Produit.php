<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idProduit';
    protected $fillable = ['idProduit', 'nom', 'nature','type','idUnite'];

    public function unite()
    {
        return $this->belongsTo(Unite::class, 'idUnite', 'idUnite');
    }

    public function getPrixProduit($idFournisseur)
    {
        $prixProduit = PrixProduit::where('idProduit', $this->idProduit)
                                  ->where('idFournisseur', $idFournisseur)
                                  ->value('prix');
        return $prixProduit;
    }
}
