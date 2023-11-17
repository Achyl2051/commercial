<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $guarded = [''];
    protected $primaryKey = 'idEmploye';

    public function getConge()
    {
        $totalEntrances = $this->conges()->where('etat', 'entrer')->where('valid', 0)->sum('duree');
        $totalExits = $this->conges()->where('etat', 'sortie')->where('valid', 0)->sum('duree');
        return $totalEntrances - $totalExits;
    }


    public function conges()
    {
        return $this->hasMany(Conge::class, 'idEmploye');
    }
    
    public function fonction()
    {
        return $this->belongsTo(Fonction::class, 'idFonction', 'idFonction');
    }
    public function direction()
    {
        return $this->belongsTo(Direction::class, 'idDirection', 'idDirection');
    }
}
