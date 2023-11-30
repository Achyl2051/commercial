<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonCommande extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'idFournisseur', 'livraison', 'modePaiement', 'dureePaiement','etat'];
    public $timestamps = false;
    protected $primaryKey = 'idBonCommande';

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'idFournisseur', 'idFournisseur');
    }
}