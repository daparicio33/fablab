<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'fecha',
        'descripcion',
        'proyecto_id'
    ];
    public function medias(){
        return $this->hasMany(Media::class);
    }
    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }
}
