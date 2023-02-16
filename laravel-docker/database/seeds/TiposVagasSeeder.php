<?php

use App\Models\TiposVagasModel;
use Illuminate\Database\Seeder;

class TiposVagasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(TiposVagasModel $tipo)
    {
        $tipo->create([
            'id' => 1,
            'nome' => 'CLT'
        ]);

        $tipo->create([
            'id' => 2,
            'nome' => 'Pessoa Jurídica'
        ]);

        $tipo->create([
            'id' => 3,
            'nome' => 'Freelancer'
        ]);
    }
}
