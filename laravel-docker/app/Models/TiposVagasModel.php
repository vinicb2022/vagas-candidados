<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposVagasModel extends Model
{
    protected $table = 'tipos_vagas';
    protected $fillable = ['id', 'nome'];


    public function relVaga() {
        return $this->hasMany('App\Models\VagasModel', 'tipo_id');
    }
}
