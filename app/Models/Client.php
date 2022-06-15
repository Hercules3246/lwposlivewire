<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Client extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_representante','nombre_establecimiento','direccion','telefono','celular','user_id','updated_by'];
 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
  


    
}
