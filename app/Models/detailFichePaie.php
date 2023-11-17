<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailFichePaie extends Model
{
    use HasFactory;
    protected $table = 'detailFichePaies';
    public $timestamps = false;
    protected $fillable = ['idFichePaie', 'designation', 'nombre','taux','type'];


    public function detailsByFichePaie($idFichePaie)
    {
        return $this->where('idFichePaie', $idFichePaie)->get();
    }

    public function ficheDePaie()
    {
        return $this->belongsTo(FicheDePaie::class, 'idFichePaie');
    }
}
