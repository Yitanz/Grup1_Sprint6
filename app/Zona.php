<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Zona;

class Zona extends Model
{
    protected $table = 'zones';

    protected $fillable = [
        'nom'
    ];
}
