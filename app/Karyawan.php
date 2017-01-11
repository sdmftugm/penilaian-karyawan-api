<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    public function getFoto($value){
    	return asset('foto/karyawan/' . $value);
    }

}
