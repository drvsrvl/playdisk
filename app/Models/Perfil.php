<?php

namespace App\Models;
use App\Models\Comentarios;
use App\Models\Lista;
use App\Models\User;
use App\Models\Cesta;
use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    public function usuario() {
        return $this->hasOne(User::class);
   }
   public function cesta() {
        return $this->hasOne(Cesta::class);
   }
   
   public function pedidos() {
        return $this->hasMany(Pedido::class);
   }
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
