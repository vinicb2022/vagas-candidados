<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatosVagasModel extends Model
{
    protected $table = 'candidatos_vagas';
    protected $fillable = ['candidato_id', 'vaga_id'];

}
