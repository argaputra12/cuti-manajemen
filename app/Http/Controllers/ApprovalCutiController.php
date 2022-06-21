<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ApprovalCutiController extends Controller
{
    //
    public function index(){
        $riwayat_cuti = DB::table('riwayat_cutis')->select('id','user_id', 'jenis_cuti_id', 'status_cuti', 'alasan_cuti', 'durasi_cuti', 'tanggal_mulai', 'tanggal_selesai')->get();

        $jenis_cuti = DB::table("jenis_cutis")->select('id', 'nama')->get()->toArray();
        // dd($riwayat_cuti);

        return view('approvalCuti', compact('riwayat_cuti', 'jenis_cuti'));
    }

    public function approved(Request $request){
        // dd($request->all());
        DB::table('riwayat_cutis')->where('id', $request->id )->update([
            'status_cuti' => 'Approved',
        ]);

        return redirect('/approvalCuti');
    }

    public function refused(Request $request){
        // dd($request->all());
        DB::table('riwayat_cutis')->where('id', $request->id )->update([
            'status_cuti' => 'Refused',
        ]);

        return redirect('/approvalCuti');
    }
}
