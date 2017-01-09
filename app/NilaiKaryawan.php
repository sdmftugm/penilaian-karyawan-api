<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiKaryawan extends Model
{
    protected $table = 'nilai_karyawan';

    public $timestamps = false;

    public static function boot()
    {
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    public function templateNilai(){
    	return $this->belongsTo('App\TemplateNilai', 'template_nilai_id');
    }
}
