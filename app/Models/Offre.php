<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [''];
    protected $primaryKey = 'idOffre';

    public function status($isvalid)
    {
        switch ($isvalid) {
            case 0 :
                // Code à exécuter si $choix est égal à 'option1'
                return "en Cours";
                break;
            case -1:
                // Code à exécuter si $choix est égal à 'option2'
                return "Cloturé";
                break;
            default :
                // Code à exécuter si $choix ne correspond à aucun des cas précédents
                return "en Pause";
                break;
        }
    }
}
