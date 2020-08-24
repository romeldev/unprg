<?php

use Illuminate\Database\Seeder;
use App\Model\Alumno;
use App\Model\Escuela;

class AlumnoEscuelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alumno_escuela')->delete();
        DB::table('alumno_escuela')->insert( $this->data() );
    }

    public function data()
    {
        $escuelaAll = Escuela::all();
        $alumnoAll = Alumno::all();

        $escuela_count = $escuelaAll->count();

        $escuela_codes = $escuelaAll->pluck('code');

        $data = [];
        $escuela_loop = 0;
        $alumno_loop = 0;

        $num_alumn_x_escuala = env('ALUMNOS_X_CURSO', 0) * env('CURSOS_X_ESCUELA', 0);

        foreach($alumnoAll as $alumno)
        {
            if( $alumno_loop == $num_alumn_x_escuala ) {
                $alumno_loop = 0;
                $escuela_loop = $escuela_loop < ($escuela_count-1)? $escuela_loop+1: 0;
            }

            $escuela_code = $escuela_codes[$escuela_loop];

            $data[] = [
                'alumno_code' => $alumno->code,
                'escuela_code' => $escuela_code,
            ];

            $alumno_loop++;
        }
        return $data;
    }
}
