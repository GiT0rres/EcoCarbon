<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'empresa',
        'cnpj',
        'setor',
        'funcionarios',
        'cidade',
        'estado',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    // ── Relacionamentos ────────────────────────────────────────────

    public function calculos()
    {
        return $this->hasMany(Calculo::class);
    }

    public function calculosConcluidos()
    {
        return $this->hasMany(Calculo::class)->where('status', 'concluido');
    }
}