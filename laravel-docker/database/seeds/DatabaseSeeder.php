<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LocaisVagasSeeder::class);
        $this->call(TiposVagasSeeder::class);
        $this->call(VagasSeeder::class);
    }
}
