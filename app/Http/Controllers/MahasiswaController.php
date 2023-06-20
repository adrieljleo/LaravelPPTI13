<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Mahasiswa;
use Illuminate\support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Models\CrudMahasiswa as CrudMahasiswaModel;

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
        // dd($mahasiswa);
        // $showData = Mahasiswa::select('tableA','tableA.field', '=', 'NamaModel.field')
        //             ->join('tableA','tableA.field', '=', 'NamaModel.field')
        //             ->leftJoin('tableA','tableA.field', '=', 'NamaModel.field')
        //             ->rightJoin('tableA','tableA.field', '=', 'NamaModel.field')
        //             ->where([
        //                 ['field1', '=', 'nilai1'],
        //                 ['field1', '=', 'nilai1'],
        //             ])
        //             ->get();
        
        $showData = Mahasiswa::join('users','users.id','=','mahasiswa.user_id')
                    ->select('mahasiswa.nim', 'mahasiswa.nama_lengkap', 'users.email')
                    ->get();
        // dd($showData);
        return view('universitas.tampildata', ['datamhs' => $showData]);

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

    public function update($id){
        // $mahasiswa = Mahasiswa::find($id);
        // $mahasiswa->nama_lengkap = 'Andi Susanto Wijaya';
        // $mahasiswa->tempat_lahir = 'Jakarta';
        // $mahasiswa->save();
        //mass update
        $mahasiswa = Mahasiswa::where('jurusan', 'Teknik Informatika')
                    ->where('tempat_lahir', 'Jakarta')
                    ->update(['alamat'=>'Surabaya','falkutas'=>'School of Computer Science']);

        return 'berhasil update';
    }    

    public function delete($id){
        // $mahasiswa = Mahasiswa::find($id);
        // $mahasiswa->delete();
        // $mahasiswa->destroy();

        //mass delete
        $mahasiswa = Mahasiswa::where('jurusan', 'Teknik Informatika')
                    ->where('tempat_lahir', 'Jakarta')
                    ->delete();
    }

    public function crud($id = ""){
        //Proses read eloquent
        $mahasiswa = CrudMahasiswaModel::all();
        if($id){
            $mhsedit = CrudMahasiswaModel::where('id', $id)->get();
            
        }else{
            $mhsedit = ""; 
        }
        return view('crud')->with('mahasiswa',$mahasiswa)->with('mhsedit', $mhsedit);
    }

    public function crudprocess(Request $request){
        $rules = [
            'nim' => 'required|min:3|max:10',
            'nama' => 'required|string|min:3|max:255',
            'gambar' => 'required|image',
            'gambar.*' => 'mimes:jpg, jpeg, png|max:12600'
        ];

        $id = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute harus minimum :min karakter',
            'max' => ':attribute harus maximum :max karakter',
            'string' => ':attribute harus huruf'
        ];

        $validator = Validator::make($request->all(), $rules, $id);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            $image = $request->file('gambar');
            $imageName = $request->nim.".".$image->getClientOriginalExtension(); //get extension file
            $moveimg = Storage::disk('public')->putFileAs('upload/',$image, $imageName);

            $mahasiswa = CrudMahasiswaModel::create([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'gambar' => $imageName
            ]);

            return redirect()->back()->with('success', 'Registrasi Berhasil');
        }
    }
}
