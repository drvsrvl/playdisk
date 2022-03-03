<?php

namespace App\Models;
use App\Models\Perfil;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;
    
    public function perfils() {
       return $this->belongsToMany(Perfil::class);
    }
}
