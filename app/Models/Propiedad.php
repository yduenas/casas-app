<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;
    protected $table = 'propiedades';
    protected $filable = ['nombre','precio','tipo','ubicacion','superficie','descripcion','propietario_id','vendedor_id'];
}
