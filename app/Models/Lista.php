<?php

namespace App\Models;
use App\Models\Perfil;
use App\Models\Cancion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;
    
    public function perfils() {
        return $this->belongsTo(Perfil::class);
    }
    
    public function cancions() {
        return $this->belongsToMany(Cancion::class);
    }

}
