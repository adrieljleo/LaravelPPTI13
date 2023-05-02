<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MahasiswaController extends Controller
{
    //
    public function index($nama, $periode){
        $arrMhs = [
            'nama1' => 'Reinert Yosua',
            'nama2' => 'Andi',
            'nama3' => 'Bejo'
        ];
    
        $nilai = [];
    
        return view('universitas.mahasiswa',[
            'nama'=>$arrMhs,
            'jurusan'=>'TI13 Boss',
            'dosen'=>$nama,
            'periode'=> Crpyt::encryptString($periode)
        ])->with('univ','Universitas Bina Nusantara')
        ->with('arrMhs', $arrMhs)->with('nilai', $nilai);
    }

    public function notif(){
        return redirect()->route('mhs')->with('success', "Berhasil tampil");
    }
}
