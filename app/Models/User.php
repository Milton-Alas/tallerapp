<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //para definir las relaciones con otras tablas
    public function gastos() {
        return $this->hasmany(Gasto::class, 'user_id', 'id');
    }

    public function ventas() {
        return $this->hasmany(Venta::class, 'user_id', 'id');
    }
  
    public function productos() {
        return $this->hasmany(Producto::class, 'user_id', 'id');
    }
    /* descomentar para agregar mas relaciones
    public function venta_detalles() {
        return $this->hasmany(Gasto::class, 'user_id', 'id');
    }
    */
}
