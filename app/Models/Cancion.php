<?php

namespace App\Models;
use App\Models\Produto;
use App\Models\Lista;
use App\Models\Artista;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    use HasFactory;
    public function produto() {
        return $this->belongsTo(Produto::class);
    }
    
    public function listas() {
        return $this->belongsToMany(Lista::class);
    }
    
     public function artistas() {
        return $this->belongsToMany(Artista::class);
    }
    
}
