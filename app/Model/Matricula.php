<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    public $table = 'matricula';

    public $timestamps = false;

    protected $fillable = [ 'alumano_code', 'curso_code', 'docente_code', 'semestre_code', 'grupo_code' ];
}
