<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ficheDePaie extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [''];
    protected $primaryKey = 'idFichePaie';
    protected $table = 'ficheDePaies';

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'idEmploye', 'idEmploye');
    }

    public static function getUniquePeriodes()
    {
        return FicheDePaie::select('periodePaiement')
            ->distinct()
            ->get()
            ->pluck('periodePaiement');
    }

    public function detailsFichePaie()
    {
        return $this->hasMany(DetailFichePaie::class, 'idFichePaie');
    }
}
