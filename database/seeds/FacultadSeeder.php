<?php

use Illuminate\Database\Seeder;
use App\Model\Facultad;

class FacultadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facultad::query()->delete();
        Facultad::insert( $this->data() );
    }

    public function data()
    {
        return [
            [ 'code' => 1, 'name' => 'Facultad de Agronomía' ],
            // [ 'code' => 2, 'name' => 'Facultad de Ciencias Biológicas' ],
            // [ 'code' => 3, 'name' => 'Facultad de Ciencias Económicas, Administrativas y Contables' ],
            // [ 'code' => 4, 'name' => 'Facultad de Ciencias Físicas y Matemáticas' ],
            // [ 'code' => 5, 'name' => 'Facultad de Ciencias Histórico Sociales y Educación' ],
            // [ 'code' => 6, 'name' => 'Facultad de Derecho y Ciencias Políticas' ],
            // [ 'code' => 7, 'name' => 'Facultad de Enfermería' ],
            // [ 'code' => 8, 'name' => 'Facultad de Ingeniería Agrícola' ],
            [ 'code' => 9, 'name' => 'Facultad de Ingeniería Civil, de Sistemas y de Arquitectura' ],
            // [ 'code' => 10, 'name' => 'Facultad de Ingeniería Mecánica y Eléctrica' ],
            // [ 'code' => 11, 'name' => 'Facultad de Medicina Humana' ],
            // [ 'code' => 12, 'name' => 'Facultad de Medicina Veterinaria' ],
            // [ 'code' => 13, 'name' => 'Facultad de Ingeniería Química e Industrias Alimentarias' ],
            // [ 'code' => 14, 'name' => 'Facultad de Zootecnia' ],
        ];
    }
}
