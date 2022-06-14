<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_representante','nombre_establecimiento','direccion','telefono','celular','routes_id'];
 
    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
