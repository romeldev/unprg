<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AlumnoEscuela extends Model
{
    public $table = 'alumno_escuela';

    public $timestamps = false;

    protected $primaryKey = 'code';

    protected $fillable = [ 'alumno_code', 'escuela_code' ];

}
