<?php

namespace App\Models;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formato extends Model
{
    use HasFactory;
    
    public function produtos() {
        return $this->belongsToMany(Produto::class)->withPivot('prezo');
    }
}
