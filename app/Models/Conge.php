<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;
    protected $fillable = ['idEmploye', 'idTypeConge', 'dateDebut', 'duree', 'etat', 'choisisseur', 'valid'];
    public $timestamps = false;
    protected $primaryKey = 'idConge';

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'idEmploye', 'idEmploye');
    }
    public function type_conge()
    {
        return $this->belongsTo(Type_conge::class, 'idTypeConge', 'idTypeConge');
    }
}
