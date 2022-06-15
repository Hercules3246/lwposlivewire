<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_representante','nombre_establecimiento','direccion','telefono','celular','user_id','updated_by'];

}
