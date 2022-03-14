<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Perfil;
use App\Models\Produto;
class Cesta extends Model
{
    use HasFactory;
    public function perfil() {
        return $this->belongsTo(Perfil::class);
   }
   
   public function produtos() {
        return $this->belongsToMany(Produto::class)->withPivot('formato');
    }
}
