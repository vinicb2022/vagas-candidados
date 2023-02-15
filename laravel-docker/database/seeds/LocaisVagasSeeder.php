<?php

use App\Models\LocaisVagasModel;
use Illuminate\Database\Seeder;

class LocaisVagasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(LocaisVagasModel $local)
    {
        $local->create([
            'nome' => 'Presencial'
        ]);

        $local->create([
            'nome' => 'Híbrido'
        ]);

        $local->create([
            'nome' => 'Remoto'
        ]);
    }
}
