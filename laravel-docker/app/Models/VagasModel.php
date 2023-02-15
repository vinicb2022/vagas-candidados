<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VagasModel extends Model
{
    protected $table = 'vagas';
    protected $fillable = ['nome', 'descricao', 'remuneracao', 'tipo_id', 'local_id'];

    const STATUS_ABERTA = 1;
    const STATUS_PAUSADA = 2;

    const STATUS = [
        self::STATUS_ABERTA => 'Em andamento',
        self::STATUS_PAUSADA => 'Pausada',
    ];

    public function getStatus() {
        return self::STATUS[$this->status];
    }

    public function relTipo() {
        return $this->hasOne('App\Models\TiposVagasModel', 'id', 'tipo_id');
    }

    public function relLocal() {
        return $this->hasOne('App\Models\LocaisVagasModel', 'id', 'local_id');
    }
}
