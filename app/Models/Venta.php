<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //
    protected $fillable = [
        'user_id',
        'cliente_id',
        'fecha',
        'metodo_pago',
        'total',
        'comentario'
    ];

    protected static function boot(){
        parent::boot();
    
        static::creating(function ($model){
            $model->user_id  = Auth()->id;
        });
    }

    // Relacion de muchos a uno con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    //relacion de muchos a uno con el modelo cliente
    public function cliente()
    {
        return $this->Hasmany(Cliente::class);
    }
    
    
}
