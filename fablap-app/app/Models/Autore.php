<?php

namespace App\Models;
use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autore extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'proyecto_id',
    ];
    public function proyectos(){
        return $this->hasMany(Proyecto::class);
    }
}
