<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Alumno;
use App\Model\Docente;
use App\Model\Curso;
use App\Model\Semestre;
use App\Model\Matricula;
use App\Model\Escuela;
use App\Model\Facultad;
use App\Model\Proceso;

class TestController extends Controller
{

    public function index()
    {
        $data = Proceso::generateData();
        dd($data);
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
            $cursos = $cursoAll->random(rand(2,3));
            foreach($cursos as $curso){
                $matriculas[] =  [
                    'cod_alumno' => $alumno->cod,
                    'cod_curso' => $curso->cod,
                    'cod_docente' => $curso->cod_docente,
                    'cod_semestre' => $semestre->cod,
                    'cod_grupo' => rand(0,1),
                ];
            }
        }

        return $matriculas;
    }

    private function addDocenteToCurso($cursosAll, $docenteAll)
    {
        $last_cod_docente = $docenteAll->last()->cod;
        $current_cod_docente = 0;

        foreach($cursosAll as $curso){
            $current_cod_docente = ($current_cod_docente<$last_cod_docente)? $current_cod_docente+1: 1;
            $curso->cod_docente = $current_cod_docente;
        }   
    }
}
