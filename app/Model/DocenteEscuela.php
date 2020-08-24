<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DocenteEscuela extends Model
{
    public $table = 'docente_escuela';

    public $timestamps = false;

    protected $primaryKey = 'code';

    protected $fillable = [ 'docente_code', 'escuela_code' ];

}
