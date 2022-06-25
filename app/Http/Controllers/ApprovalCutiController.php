<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ApprovalCutiController extends Controller
{
    //
    public function index(){
        $riwayat_cuti = DB::table('riwayat_cutis')->select('riwayat_cutis.id','user_id', 'jenis_cuti_id', 'status_cuti', 'alasan_cuti', 'durasi_cuti', 'tanggal_mulai', 'bukti_cuti', 'tanggal_selesai', 'users.nama as nama_user', 'jenis_cutis.nama as nama_cuti')
        ->join('jenis_cutis', 'jenis_cutis.id', '=', 'riwayat_cutis.jenis_cuti_id')
        ->join('users', 'users.id', '=', 'riwayat_cutis.user_id')
        ->groupBy('riwayat_cutis.id')
        ->paginate(10);



        return view('approvalCuti', compact('riwayat_cuti'));
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
