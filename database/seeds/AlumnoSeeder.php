<?php

use Illuminate\Database\Seeder;
use App\Model\Alumno;
use App\Model\Escuela;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amount = env('ALUMNOS_X_CURSO', 0) * env('CURSOS_X_ESCUELA', 0) * Escuela::count();
        Alumno::query()->delete();
        factory(Alumno::class, $amount)->create();
    }
}
