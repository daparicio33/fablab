<?php

use App\Models\Noticia;

function existeEtiqueta($etiqueta_id,$noticia_id){
    $noticia = Noticia::findOrfail($noticia_id);
    foreach ($noticia->netiquetas as $key => $netiqueta) {
        # code...
        if ($netiqueta->etiqueta_id == $etiqueta_id )
        {
            return true;
        }
    }
    return false;
}