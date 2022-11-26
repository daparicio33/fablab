<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    public function netiquetas(){
        return $this->hasMany(NoticiaEtiqueta::class);
    }
    public function imagenes(){
        return $this->hasMany(Imagene::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function syncetiquetas($id){
        try {
            //code...
            //se supone que es un array
            $rows = count($id);
            //vamos a borrar las etiquetas anteriores
            NoticiaEtiqueta::where('noticia_id','=',$this->id)
            ->delete();
            //ahora vamos a recorres el array
            for ($i=0;$i<$rows;$i++){
                $ne = new NoticiaEtiqueta;
                $ne->noticia_id = $this->id;
                $ne->etiqueta_id = $id[$i];
                $ne->save();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return FALSE;
        }
        return TRUE;
    }
}
