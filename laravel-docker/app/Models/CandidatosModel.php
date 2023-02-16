<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatosModel extends Model
{
    protected $table = 'candidatos';
    protected $fillable = ['id', 'nome', 'email', 'telefone', 'descricao', 'formacao_academica', 'experiencia_profissional', 'habilidades_especificas', 'usuario_id'];

    public function relUsuario() {
        return $this->hasOne('App\User', 'id', 'usuario_id');
    }
}
