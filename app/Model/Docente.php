<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    public $table = 'docente';

    public $timestamps = false;

    protected $primaryKey = 'code';

    protected $fillable = [ 'fullname'];

}
