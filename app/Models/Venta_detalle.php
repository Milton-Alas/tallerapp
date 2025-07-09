<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta_detalle extends Model
{
    //
    protected $fillable = [
        'venta_id',
        'producto_id',
        'cantidad',
        'precio',
        'comentario'
    ];

    /* descomentar para agregar relacion
    protected static function boot(){
        parent::boot();
    
        static::creating(function ($model){
            $model->created_by = Auth()->id;
        });
        
    }
         */
}
