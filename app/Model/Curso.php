<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public $table = 'curso';

    public $timestamps = false;

    protected $primaryKey = 'code';

    protected $fillable = [ 'name' ];

}
