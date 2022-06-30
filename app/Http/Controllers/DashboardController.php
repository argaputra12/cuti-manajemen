<?php

namespace App\Http\Controllers;

use App\Models\JenisCuti;
use App\Models\RiwayatCuti;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    // public function __construct(){
    //     $this->middleware(['auth','verified']);
    // }

    public function index(){

        if(Auth::user()){
            $riwayat_cuti = RiwayatCuti::where('user_id', Auth::user()->id)->select('riwayat_cutis.jenis_cuti_id', 'riwayat_cutis.status_cuti', 'riwayat_cutis.alasan_cuti', 'riwayat_cutis.durasi_cuti', 'riwayat_cutis.tanggal_mulai', 'riwayat_cutis.tanggal_selesai', 'jenis_cutis.nama', 'riwayat_cutis.id as riwayat_cuti_id')
            ->join('jenis_cutis', 'jenis_cutis.id', '=', 'riwayat_cutis.jenis_cuti_id')
            ->groupBy('riwayat_cutis.id')
            ->paginate(5);

            // Update cuti tahunan
            $newYear = new Carbon('first day of January this year');
            $now = new Carbon(now());

            if($now == $newYear){

                DB::table('users')
                ->join('konfigurasi_cutis', 'konfigurasi_cutis.id', '=', 'users.konfigurasi_cutis_id')
                ->update([
                    'sisa_cuti' => DB::table('konfigurasi_cutis')->where('tahun', date('Y'))->first()->jumlah_cuti_maksimum - DB::table('konfigurasi_cutis')->where('tahun', date('Y'))->first()->jumlah_cuti_bersama
                ]);
            }


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
