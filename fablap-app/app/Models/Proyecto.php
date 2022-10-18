<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
        'user_id',
    ];
    public function entradas(){
        return $this->hasMany(Entrada::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
