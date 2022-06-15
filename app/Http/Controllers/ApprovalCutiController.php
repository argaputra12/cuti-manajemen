<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ApprovalCutiController extends Controller
{
    //
    public function index(){
        $riwayat_cuti = DB::table('riwayat_cutis')->select('user_id', 'jenis_cuti_id', 'status_cuti', 'alasan_cuti', 'durasi_cuti', 'tanggal_mulai', 'tanggal_selesai')->get();

        
        // dd($riwayat_cuti);

        return view('approvalCuti', compact('riwayat_cuti'));
    }
}
