<?php

namespace App\Models;
use App\Models\Comentarios;
use App\Models\Lista;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    
    public function comentarios() {
        return $this->hasMany(Comentario::class);
    }
    
    public function notificacions() {
        return $this->belongsToMany(Notificacion::class);
    }
    
    public function listas() {
        return $this->hasMany(Lista::class);
    }
    
}
