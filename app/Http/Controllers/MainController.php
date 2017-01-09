<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Karyawan;
use App\TemplateNilai;
use App\NilaiKaryawan;
use Response;

class MainController extends Controller
{
    public function getListKaryawan(){
    	$karyawan = Karyawan::get();
    	if ($karyawan->count()) {
    		$list['karyawan'] = array();
    		foreach ($karyawan as $ky) {
    			$k = array();
    			$k['id'] = $ky->id;
    			$k['name'] = $ky->nama;
    			$k['photo'] = $ky->foto;
    			array_push($list['karyawan'], $k);
    		}
    		return Response::json([
                    'kode'=> 1,
                    'data'=>$list['karyawan']
                ]);
    	}else{
    		return Response::json([
                    'kode'=>2
                ]);
    	}
    }

    public function givePoint(Request $request){
    	$point = $request->point;
    	$karyawanId = $request->karyawan_id;
    	$template = TemplateNilai::where('point', $point)->get()->first();
    	$nilai = new NilaiKaryawan();
    	$nilai->karyawan_id = $karyawanId;
        $nilai->templateNilai()->associate($template);
    	$nilai->save();
        return Response::json([
                'kode'=>1
            ]);
    }
}
