<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calculo extends Model
{
    protected $fillable = [
        'user_id',
        'empresa',
        'cnpj',
        'setor',
        'funcionarios',
        'cidade',
        'estado',
        'ano_referencia',
        'responsavel',
        'email_responsavel',
        'status',
    ];

    protected $casts = [
        'ano_referencia' => 'integer',
        'funcionarios'   => 'integer',
    ];

    // ── Relacionamentos ────────────────────────────────────────────

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fonteEmissao()
    {
        return $this->hasOne(FonteEmissao::class);
    }

    // ── Escopos ────────────────────────────────────────────────────

    public function scopeConcluidos($query)
    {
        return $query->where('status', 'concluido');
    }

    public function scopeDoUsuario($query)
    {
        return $query->where('user_id', auth()->id());
    }
}