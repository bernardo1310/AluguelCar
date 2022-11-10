<?php

namespace App\Models;

use App\Models\carros;
use App\Models\contatos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aluguel extends Model
{
    use HasFactory;

    public function carro(){
        return $this->belongsTo(Carros::class,'idCarro','id');
    }
    public function contato(){
        return $this->belongsTo(Contatos::class,'idContato','id');
    }
}
