<?php

use Illuminate\Database\Seeder;
use App\Model\Escuela;

class EscuelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Escuela::query()->delete();
        Escuela::insert( $this->data() );
    }

    private function data()
    {
        return [
            [ 'code' => 1, 'name' => 'Agronomía', 'facultad_code' => 1 ],
            // [ 'code' => 2, 'name' => 'Biología', 'facultad_code' => 2 ],
            // [ 'code' => 3, 'name' => 'Contabilidad', 'facultad_code' => 3 ],
            // [ 'code' => 4, 'name' => 'Economía', 'facultad_code' => 3 ],
            // [ 'code' => 5, 'name' => 'Administración', 'facultad_code' => 3 ],
            // [ 'code' => 6, 'name' => 'Comercio y Negocios Internacionales', 'facultad_code' => 3 ],
            // [ 'code' => 7, 'name' => 'Física', 'facultad_code' => 4 ],
            // [ 'code' => 8, 'name' => 'Matemáticas', 'facultad_code' => 4 ],
            // [ 'code' => 9, 'name' => 'Estadística', 'facultad_code' => 4 ],
            // [ 'code' => 10, 'name' => 'Ingeniería de Computación e Informática', 'facultad_code' => 4 ],
            // [ 'code' => 11, 'name' => 'Ingeniería Electrónica', 'facultad_code' => 4 ],
            // [ 'code' => 12, 'name' => 'Educación', 'facultad_code' => 5 ],
            // [ 'code' => 13, 'name' => 'Sociología', 'facultad_code' => 5 ],
            // [ 'code' => 14, 'name' => 'Ciencias de la Comunicación', 'facultad_code' => 5 ],
            // [ 'code' => 15, 'name' => 'Psicología', 'facultad_code' => 5 ],
            // [ 'code' => 16, 'name' => 'Arte', 'facultad_code' => 5 ],
            // [ 'code' => 17, 'name' => 'Arqueología', 'facultad_code' => 6 ],
            // [ 'code' => 18, 'name' => 'Derecho', 'facultad_code' => 6 ],
            // [ 'code' => 19, 'name' => 'Ciencia Política', 'facultad_code' => 6 ],
            // [ 'code' => 20, 'name' => 'Enfermería', 'facultad_code' => 7 ],
            // [ 'code' => 21, 'name' => 'Ingeniería Agrícola', 'facultad_code' => 8 ],
            // [ 'code' => 22, 'name' => 'Ingeniería Civil', 'facultad_code' => 9 ],
            [ 'code' => 23, 'name' => 'Arquitectura', 'facultad_code' => 9 ],
            [ 'code' => 24, 'name' => 'Ingeniería de Sistemas', 'facultad_code' => 9 ],
            // [ 'code' => 25, 'name' => 'Ingeniería Mecánica y Eléctrica', 'facultad_code' => 10 ],
            // [ 'code' => 26, 'name' => 'Medicina Humana', 'facultad_code' => 11 ],
            // [ 'code' => 27, 'name' => 'Medicina Veterinaria', 'facultad_code' => 12 ],
            // [ 'code' => 28, 'name' => 'Ingeniería Química', 'facultad_code' => 13 ],
            // [ 'code' => 29, 'name' => 'Ingeniería en Industrias Alimentarias', 'facultad_code' => 13 ],
            // [ 'code' => 30, 'name' => 'Zootecnia', 'facultad_code' => 14 ],            
        ];
    }
}
