<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    public $table = 'alumno';

    public $timestamps = false;

    protected $primaryKey = 'code';

    protected $fillable = [ 'fullname' ];
}
