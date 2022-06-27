<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

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




        // Update sisa cuti
        DB::table('riwayat_cutis')->where('id', $request->id )->update([
            'status_cuti' => 'Approved',
        ]);

        return back();

    }

    public function refused(Request $request){
        // dd($request->all());
        DB::table('riwayat_cutis')->where('id', $request->id )->update([
            'status_cuti' => 'Refused',
        ]);

        return redirect('/approvalCuti');
    }

    public function download(Request $request){

        //Create PDF approval cuti
        $data = DB::table('riwayat_cutis')->select('riwayat_cutis.id', 'jenis_cuti_id', 'status_cuti', 'alasan_cuti', 'durasi_cuti', DB::raw('DATE_FORMAT(tanggal_mulai, "%d %M %Y") as tanggal_mulai'), 'bukti_cuti', DB::raw('DATE_FORMAT(tanggal_selesai, "%d %M %Y") as tanggal_selesai'), 'users.nama as nama_user', DB::raw('MONTH(CURDATE()) as bulan'), DB::raw('YEAR(CURDATE()) as tahun'), DB::raw('DATE_FORMAT(CURDATE(), "%d %M %Y") as tanggal'), 'users.nip as nip')
        ->where('riwayat_cutis.id', $request->riwayat_cuti_id)
        ->join('users', 'users.id', '=', 'riwayat_cutis.user_id')
        ->get();

        $bulan_romawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");

        $pdf_data = [
            'data' => $data[0],
            'bulan' => $bulan_romawi[$data[0]->bulan]
        ];
        // dd($pdf_data);

        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::loadView('pdf/cutiApproved', $pdf_data);
        // dd($pdf);
        return $pdf->stream('cutiApproved.pdf');
    }
}
