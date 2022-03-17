<?php

namespace App\Models;
use App\Models\Produto;
use App\Models\Cancion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;
    
    public function produtos() {
        return $this->belongsToMany(Produto::class);
    }
    
     public function cancions() {
        return $this->belongsToMany(Cancion::class);
    }
}
