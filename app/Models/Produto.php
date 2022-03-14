<?php

namespace App\Models;
use App\Models\Formato;
use App\Models\Cancion;
use App\Models\Artista;
use App\Models\Xenero;
use App\Models\Comentario;
use App\Models\Cesta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    
    public function formatos() {
        return $this->belongsToMany(Formato::class)->withPivot('prezo');
    }
    
    public function cancions() {
        return $this->hasMany(Cancion::class);
    }
    
    public function artistas() {
        return $this->belongsToMany(Artista::class);
    }
    
    public function xeneros() {
        return $this->belongsToMany(Xenero::class);
    }
    
    public function comentarios() {
        return $this->hasMany(Comentario::class);
    }
    
    public function cestas() {
        return $this->belongsToMany(Cesta::class);
    }
    
}
