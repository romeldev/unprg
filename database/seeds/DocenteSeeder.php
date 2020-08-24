<?php

use Illuminate\Database\Seeder;
use App\Model\Docente;
use App\Model\Escuela;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amount = env('DOCENTES_X_ESCUELA', 0) * Escuela::count();
        Docente::query()->delete();
        factory(Docente::class, $amount)->create();
    }
}
