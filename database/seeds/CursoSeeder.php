<?php

use Illuminate\Database\Seeder;
use App\Model\Curso;
use App\Model\Escuela;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amount = env('CURSOS_X_ESCUELA', 0) * Escuela::count();
        Curso::query()->delete();
        factory(Curso::class, $amount)->create();
    }
}
