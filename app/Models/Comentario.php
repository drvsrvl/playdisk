<?php

namespace App\Models;
use App\Models\Produto;
use App\Models\Perfil;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    
    public function produto() {
        return $this->belongsTo(Produto::class);
    }
    
     public function perfil() {
        return $this->belongsTo(Perfil::class);
    }
}
