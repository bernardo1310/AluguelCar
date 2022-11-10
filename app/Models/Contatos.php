<?php

namespace App\Models;

use App\Models\aluguel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{
    use HasFactory;

    public function aluguel(){
        return $this->hasMany(aluguel::class ,'idContato','id');
    }
}
