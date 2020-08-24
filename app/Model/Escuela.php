<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    public $table = 'escuela';

    public $timestamps = false;

    protected $fillable = [ 'name' , 'facultad_code'];


   

}
