<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProForma extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [''];
    protected $primaryKey = 'idProForma';

    protected $table = 'pro_formas';

    

}
