<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function(){
    echo "Hellow World";
    return redirect()->route('belajar');
});

Route::get('/belajar', function(){
    echo "<h1>Hellow World</h1>";
    echo "<p>Sedang belajar laravel</p>";
})->name('belajar');

Route::get('/mahasiswa/ppti/binus/adriel', function(){
    echo "<h2 style='text-align : center'>Adriel Ganteng & Tatha Cantik</h2>";
});

// Route::get('/mahasiswa/{id}/{nama?}/{jurusan?}', 
//     function($x, $a='AdrielBang', $b='Fisika Murni UGM'){
//     return "id gw tuh $x Mahasiswa $a jurusannya $b";
// })->where('id','[0-9]+');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mhs');
Route::get('/mahasiswa/{nama}/{periode}', [MahasiswaController::class, 'index'])->name('mhs');
Route::get('/dosen',function(){
    $arrMhs = [
        'nama1' => 'Reinert Yosua',
        'nama2' => 'Andi',
        'nama3' => 'Bejo'
    ];

    $nilai = [];

    return view('universitas.dosen',[
        'nama'=>$arrMhs,
        'jurusan'=>'TI13 Boss'
    ])->with('univ','Universitas Bina Nusantara')
    ->with('arrMhs', $arrMhs)->with('nilai', $nilai);
})->name('dsn');;
//mengirim data ke view
//-argument, method with, compact

Route::get('/hubungi-kami', function(){
    return "Hubungi Kami";
});

Route::redirect('/contact-us', '/hubungi-kami');
Route::get('/notif', [MahasiswaController::class, 'notif'])->name('notif.mhs');

//Route::<jenismethod>(<URL>, <proses yang mau dijalankan>)
//jenismethod : get, post, put, delete
//Proses yang mau dijalankan ada 2, yaitu : controller, anonymous function. 
//Co : [LoginController::class, 'index']
//Co : 
// function(){
//     return bla;
// }



