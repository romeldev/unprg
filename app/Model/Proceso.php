<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Alumno;
use App\Model\Docente;
use App\Model\Curso;
use App\Model\Semestre;
use App\Model\Matricula;
use App\Model\Escuela;
use App\Model\Facultad;
use App\Model\DocenteEscuela;
use App\Model\AlumnoEscuela;

class Proceso extends Model
{
    public $matriculas = [];

    public $cursos_x_escuela = 10; // mas grupos 33% de grupos adicionales

    public $docentes_x_escuela = 5;   
    
    public $alumnos_x_curso = 15;

    public $avg_alumnos_x_curso = 2;

    public function __construct()
    {
        $this->docentes_x_escuela = (int) env('DOCENTES_X_ESCUELA', 0);
        $this->cursos_x_escuela = (int) env('CURSOS_X_ESCUELA', 0);
        $this->alumnos_x_curso = (int) env('ALUMNOS_X_CURSO', 0);
        $this->avg_alumnos_x_curso = (int) env('AVG_ALUMNOS_X_CURSO', 0);
    }

    public static function generateData()
    {
        $entity = new Proceso();
        $entity->data();
    }

    public function data()
    {
        $facultades = Facultad::all();
        $semestres = Semestre::limit(1)->get();
        // $semestres = Semestre::all();

        Docente::query()->delete();
        Curso::query()->delete();
        Alumno::query()->delete();
        Matricula::query()->delete();
        DocenteEscuela::query()->delete();
        AlumnoEscuela::query()->delete();

        foreach($semestres as $semestre)
        {
            foreach($facultades as $facultad)
            {
                foreach($facultad->escuelas as $escuela)
                {
                    $this->crearDocentes( $escuela );
                    $this->crearCursos( $escuela );
                    $this->crearAlumnos( $escuela );
                    $this->createDocenteEscuela( $escuela );
                    $this->createAlumnoEscuela( $escuela );
                    $this->crearMatriculas( $semestre, $escuela );
                }
            }
        }

        $parts = array_chunk($this->matriculas, 100);
        foreach($parts as $data)
        {
            Matricula::insert($data);
        }
        // dd( $this->matriculas);
        return $this->matriculas;
    }

    public function crearDocentes( &$escuela )
    {
        $docentes = factory(Docente::class, $this->docentes_x_escuela)->create();
        $escuela->docentes = $docentes;
    }

    public function crearCursos( &$escuela )
    {
        $cursos = factory(Curso::class, $this->cursos_x_escuela)->create();

        $count_docentes = $escuela->docentes->count();
        $docente_idx = 0;

        foreach($cursos as $curso)
        {
            $curso->name = "[E$escuela->code] $curso->name";
            $curso->group = "A";
            $curso->docente = $escuela->docentes[$docente_idx];
            $docente_idx = ($docente_idx < $count_docentes-1)? $docente_idx+1: 0;

            if( [0,0,1][rand(0,2)] == 1)
            {
                $curso2 = new Curso;
                $curso2->code = $curso->code;
                $curso2->name = $curso->name;
                $curso2->group = "B";
                $curso2->docente = $escuela->docentes[$docente_idx];
                $cursos->push($curso2);
                $docente_idx = ($docente_idx < $count_docentes-1)? $docente_idx+1: 0;
            }
        }

        // dd($cursos->toArray());
        $escuela->cursos = $cursos;
    }

    public function crearAlumnos( &$escuela )
    {
        $amount = ($escuela->cursos->count() * $this->alumnos_x_curso);
        $amount = (int) round($amount / $this->avg_alumnos_x_curso);
        $alumnos = factory(Alumno::class, $amount)->create();
        $escuela->alumnos = $alumnos;
    }

    public function crearMatriculas( $semestre, $escuela )
    {
        $matriculas = [];
        $curso_idx = 0;
        $total_cursos = $escuela->cursos->count();

        foreach($escuela->alumnos as $alumno)
        {
            // cada alumno en promedio se matricula en 2 cursos
            $num_cursos = rand(1,3);

            for($x=0; $x < $num_cursos; $x++ )
            {
                $curso = $escuela->cursos[$curso_idx];
                $this->matriculas[] = [
                    'semestre_code' => $semestre->code,
                    'alumno_code' => $alumno->code,
                    'docente_code' => $curso->docente->code,
                    'curso_code' => $curso->code,
                    'grupo_code' => $curso->group,
                ];

                $curso_idx = ($curso_idx < $total_cursos-1)? $curso_idx+1: 0;
            }
        }
    }

    public function createDocenteEscuela($escuela)
    {
        $rows = [];
        foreach($escuela->docentes as $docente)
        {
            $rows[] = [
                'escuela_code' => $escuela->code,
                'docente_code' => $docente->code,
            ];
        }

        $parts = array_chunk($rows, 500);
        foreach($parts as $data) DocenteEscuela::insert($data);
    }

    public function createAlumnoEscuela($escuela)
    {
        $rows = [];
        foreach($escuela->alumnos as $alumno)
        {
            $rows[] = [
                'escuela_code' => $escuela->code,
                'alumno_code' => $alumno->code,
            ];
        }

        $parts = array_chunk($rows, 500);
        foreach($parts as $data) AlumnoEscuela::insert($data);
    }

}
