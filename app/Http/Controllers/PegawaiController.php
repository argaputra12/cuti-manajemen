<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Database\Seeders\PegawaiSeeder;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::All();
        // dd($data);
        return view('pegawai', compact('data'),[
            'title' => 'Data Pegawai',
            'content' => 'Ini adalah halaman data pegawai'
        ]);
    }

    public function tambahpegawaiform(){
        return view('tambahpegawai',[
            'title' => 'Tambah Pegawai',
            'content' => 'Ini adalah halaman tambah pegawai'
        ]);
    }

    public function insertdata(Request $request){
        // dd($request->all());
        Pegawai::create($request->All());
        return redirect('/pegawai');
    }
}
