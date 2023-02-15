<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VagasModel extends Model
{
    protected $table = 'vagas';
    protected $fillable = ['nome', 'descricao', 'remuneracao', 'tipo_id', 'local_id'];

    public function relTipo() {
        return $this->hasOne('App\Models\TiposVagasModel', 'id', 'tipo_id');
    }

    public function relLocal() {
        return $this->hasOne('App\Models\LocaisVagasModel', 'id', 'local_id');
    }
}
