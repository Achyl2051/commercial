<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatStock extends Model
{
    use HasFactory;
    protected $table = 'etatStock';
    public $timestamps = false;
    protected $fillable = ['produit', 'stock_actuel','unite','prixUnitaire','prixTotal','magasin'];
}
