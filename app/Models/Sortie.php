<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sortie extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idSortie';
    protected $fillable = ['idSortie', 'idEntre','date','quantite'];
}
