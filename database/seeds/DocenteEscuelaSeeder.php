<?php

use Illuminate\Database\Seeder;
use App\Model\Docente;
use App\Model\Escuela;

class DocenteEscuelaSeeder extends Seeder
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
        $avg = env('AVG_ESCUELAS_ADICIONALES', null);
        $avgArray = explode("-", $avg);
        if( $avg!=null && count($avgArray)==2){
            $this->r1 = trim($avgArray[0]);
            $this->r2 = trim($avgArray[1]);
        }

        DB::table('docente_escuela')->delete();
        DB::table('docente_escuela')->insert( $this->data() );
    }

    public function data()
    {
        $escuelaAll = Escuela::all();
        $docenteAll = Docente::all();

        $escuela_count = $escuelaAll->count();

        $escuela_codes = $escuelaAll->pluck('code');

        $data = [];
        $escuela_loop = 0;
        $docente_loop = 0;

        foreach($docenteAll as $docente)
        {
            if( $docente_loop == env('DOCENTES_X_ESCUELA', 0) ) {
                $docente_loop = 0;
                $escuela_loop = $escuela_loop < ($escuela_count-1)? $escuela_loop+1: 0;
            }

            $escuela_code = $escuela_codes[$escuela_loop];

            $data[] = [
                'docente_code' => $docente->code,
                'escuela_code' => $escuela_code,
            ];

            $this->addMoreEscuelas($docente->code, $escuela_code, $escuelaAll, $data);

            $docente_loop++;
        }

        return $data;
    }

    public function addMoreEscuelas($docente_code, $escuela_principal_code, $escuelaAll, &$data)
    {
        $escuelas = $escuelaAll->where('code', '<>', $escuela_principal_code)->random(rand($this->r1, $this->r2));
        foreach($escuelas as $escuela)
        {
            $data[] = [
                'docente_code' => $docente_code,
                'escuela_code' => $escuela->code,
            ];
        }
        // dd($escuelas->count(), $data);
    }
}
