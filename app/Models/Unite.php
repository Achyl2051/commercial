<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idUnite';
    protected $fillable = ['idUnite', 'nom' ];
}
