<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre',
        'telefono',
        'direccion'
    ];
    //

    // relacion de muchos a uno con ventas
    public function ventas()
    {
        return $this->Hasmany(Venta::class);
    }

}
