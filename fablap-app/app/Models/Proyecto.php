<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'fecha',
        'descripcion'
    ];
    public function autores(){
        return $this->hasMany(Autore::class);
    }
}
