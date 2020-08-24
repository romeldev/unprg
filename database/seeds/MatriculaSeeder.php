<?php

use Illuminate\Database\Seeder;
use App\Model\Alumno;
use App\Model\Docente;
use App\Model\Curso;
use App\Model\Semestre;
use App\Model\Matricula;

class MatriculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public $r1 = 0;
    public $r2 = 0;

    public function run()
    {
        $avg = env('AVG_CURSOS_X_ALUMNO', null);
        $avgArray = explode("-", $avg);
        if( $avg!=null && count($avgArray)==2){
            $this->r1 = trim($avgArray[0]);
            $this->r2 = trim($avgArray[1]);
        }

        Matricula::query()->delete();
        Matricula::insert( $this->data() );
    }

    private function data()
    {
        $matriculas = [];

        $cursoAll = Curso::all();
        $alumnoAll = Alumno::all();
        $docenteAll = Docente::all();
        $semestreAll = Semestre::all();
        $semestre = $semestreAll->last();
        
        $this->addDocenteToCurso($cursoAll, $docenteAll);


        foreach($alumnoAll as $alumno){

            $cursos = $cursoAll->random(rand($this->r1,$this->r2));
            foreach($cursos as $curso){
                $matriculas[] =  [
                    'alumno_code' => $alumno->code,
                    'curso_code' => $curso->code,
                    'docente_code' => $curso->docente_code,
                    'semestre_code' => $semestre->code,
                    'grupo_code' => ['A', 'B', 'C'][rand(0,2)],
                ];
            }
        }
        return $matriculas;
    }

    private function addDocenteToCurso($cursosAll, $docenteAll)
    {
        $last_docente_code = $docenteAll->last()->code;
        $current_docente_code = 0;

        foreach($cursosAll as $curso){
            $current_docente_code = ($current_docente_code<$last_docente_code)? $current_docente_code+1: 1;
            $curso->docente_code = $current_docente_code;
        }   
    }
}
