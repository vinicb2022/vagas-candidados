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
            'id' => 1,
            'nome' => 'Presencial'
        ]);

        $local->create([
            'id' => 2,
            'nome' => 'Híbrido'
        ]);

        $local->create([
            'id' => 3,
            'nome' => 'Remoto'
        ]);
    }
}
