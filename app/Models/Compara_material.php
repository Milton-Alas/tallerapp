<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compara_material extends Model
{
    //
    protected $fillable = [
        'material_id',
        'cantidad',
        'costo_total',
        'fecha',
        'comentario'
    ];

    //relacion con Material
    public function material()
    {
        return $this->BelongsTo(Material::class);
    }
}
