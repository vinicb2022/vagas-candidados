<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocaisVagasModel extends Model
{
    protected $table = 'locais_vagas';
    protected $fillable = ['id', 'nome'];

    public function relVaga() {
        return $this->hasMany('App\Models\VagasModel', 'local_id');
    }
}
