<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    public $table = 'facultad';

    public $timestamps = false;

    protected $fillable = [ 'code', 'name' ];


    public function escuelas()
    {
        return $this->hasMany(Escuela::class, 'facultad_code', 'code');
    }
}
