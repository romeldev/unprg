<?php

use Illuminate\Database\Seeder;
use App\Model\Proceso;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FacultadSeeder::class);
        $this->call(EscuelaSeeder::class);
        $this->call(SemestreSeeder::class);
        // $this->call(AlumnoSeeder::class);
        // $this->call(DocenteSeeder::class);
        // $this->call(CursoSeeder::class);
        // $this->call(MatriculaSeeder::class);
        Proceso::generateData();
        
        // $this->call(DocenteEscuelaSeeder::class);
        // $this->call(AlumnoEscuelaSeeder::class);
    }    
}
