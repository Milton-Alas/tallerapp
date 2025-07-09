<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    //
    protected $fillable = [
        'user_id',
        'concepto',
        'monto',
        'fecha',
        'comentario'
    ];

    protected static function boot(){
        parent::boot();
    
        static::creating(function ($model){
            $model->created_by = Auth()->id;
        });
    }
}
