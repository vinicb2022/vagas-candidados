<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposVagasModel extends Model
{
    protected $table = 'tipos_vagas';

    public function relVaga() {
        return $this->hasMany('App\Models\VagasModel', 'tipo_id');
    }
}
