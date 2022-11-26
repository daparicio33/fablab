<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticiaEtiqueta extends Model
{
    use HasFactory;
    public function etiqueta(){
        return $this->belongsTo(Etiqueta::class);
    }
    public function noticia(){
        return $this->belongsTo(Noticia::class);
    }
}
