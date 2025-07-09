<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //
    protected $fillable = [
        'nombre',
        'descripcion',
        'unidad_medida'
    ];

    //relacion con compra_material
    public function compras_materiales()
    {
        return $this->Hasmany(Compra_Material::class);
    }
}
