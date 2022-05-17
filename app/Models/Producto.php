<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;

    protected $fillable=['descripcion','id_categoria'];

    use HasFactory;
    public function categoria(){
        return $this->belongsTo(Categoria::class,'id_categoria');
    }
}
