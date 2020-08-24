<?php

use Illuminate\Database\Seeder;
use App\Model\Semestre;
use Carbon\Carbon;

class SemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semestre::query()->delete();
        Semestre::insert( $this->data( env('SEMESTRES',0) ) );
    }

    public function data( $amount=0)
    {
        $year_init = 2020;

        $data = [];
        for ($year=$year_init; $year > ($year_init-$amount); $year--) { 
            for ($i=0; $i <= 1 ; $i++) { 
                $data[] = [
                    'name' => "SEMESTER $year-".['I', 'II'][$i],
                    'date_start' => $year.['-03-01', '-08-01'][$i],
                    'date_end' => $year.['-07-31', '-12-31'][$i],
                ];
            }
        }

        return $data;
    }
}
