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
            $riwayat_cuti = RiwayatCuti::where('user_id', Auth::user()->id)->select('jenis_cuti_id', 'status_cuti', 'alasan_cuti', 'durasi_cuti', 'tanggal_mulai', 'tanggal_selesai')->get();
    
            $jenis_cuti = DB::table("jenis_cutis")->select('id', 'nama')->get()->toArray();
          
            // dd($a);
    
            return view('dashboard',compact('riwayat_cuti', 'jenis_cuti'));

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

    public function admin(){
        $riwayat_cuti = DB::table('riwayat_cutis')->select('user_id', 'jenis_cuti_id', 'status_cuti', 'alasan_cuti', 'durasi_cuti', 'tanggal_mulai', 'tanggal_selesai')->get();

        
        // dd($riwayat_cuti);

        return view('adminDashboard', compact('riwayat_cuti'));
    }
    
}