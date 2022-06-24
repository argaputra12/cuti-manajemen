<?php

namespace App\Http\Controllers;

use App\Models\JenisCuti;
use App\Models\RiwayatCuti;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){

        if(Auth::user()){
            $riwayat_cuti = RiwayatCuti::where('user_id', Auth::user()->id)->select('riwayat_cutis.jenis_cuti_id', 'riwayat_cutis.status_cuti', 'riwayat_cutis.alasan_cuti', 'riwayat_cutis.durasi_cuti', 'riwayat_cutis.tanggal_mulai', 'riwayat_cutis.tanggal_selesai', 'jenis_cutis.nama')
            ->join('jenis_cutis', 'jenis_cutis.id', '=', 'riwayat_cutis.jenis_cuti_id')
            ->groupBy('riwayat_cutis.id')
            ->paginate(5);

            // dd($riwayat_cuti);
            // $jenis_cuti = DB::table("jenis_cutis")->select('id')->get();

            // dd($a);

            return view('dashboard',compact('riwayat_cuti'));

        }
        else{
            return view('dashboard');
        }

    }

    public function profile(){
        $department = DB::table('departments')->where('id', Auth::user()->department_id)->get();
        $nama_department = $department[0]->nama;
        return view('profile', compact('nama_department'));
    }



}
