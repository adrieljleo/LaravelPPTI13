<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Mahasiswa;

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
            'periode'=> '1'
        ])->with('univ','Universitas Bina Nusantara')
        ->with('arrMhs', $arrMhs)->with('nilai', $nilai);
    }

    public function notif(){
        return redirect()->route('mhs')->with('success', "Berhasil tampil");
    }

    public function cekobject(){
        $mahasiswa = Mahasiswa::all();
        dd($mahasiswa);
    }

    public function insert(){
        Mahasiswa::create([
            'user_id' => '1',
            'nim' => '20201234',
            'nama_lengkap' => 'Reinert Yosua Rumagit',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2000-11-12',
            'alamat' => 'Jakarta Barat',
            'falkutas' => 'SoCS',
            'jurusan' => 'Teknik Informatika',
        ]);

        return "berhasil diproses";
    }
}
