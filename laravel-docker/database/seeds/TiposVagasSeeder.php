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
            'nome' => 'CLT'
        ]);

        $tipo->create([
            'nome' => 'Pessoa Jurídica'
        ]);

        $tipo->create([
            'nome' => 'Freelancer'
        ]);
    }
}
