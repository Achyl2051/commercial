<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{use HasFactory;

    public $timestamps = false;
    protected $guarded = [''];
    protected $primaryKey = 'idContrat';
    //protected $fillable = ['idEmploye', 'idTypeContrat'];

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'idEmploye', 'idEmploye');
    }
    public function typeContrat()
    {
        return $this->belongsTo(TypeContrat::class, 'idTypeContrat', 'idTypeContrat');
    }
}
