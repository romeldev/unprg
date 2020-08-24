<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    public $table = 'semestre';

    public $timestamps = false;

    protected $fillable = [ 'name', 'date_start', 'date_end' ];
}
