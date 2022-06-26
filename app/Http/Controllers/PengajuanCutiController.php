<?php

namespace App\Http\Controllers;

use App\Models\JenisCuti;
use App\Models\RiwayatCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\KonfigurasiCuti;
use Error;
use Illuminate\Support\Facades\Auth;

class PengajuanCutiController extends Controller
{
    //
    public function index(){
        return view('pengajuan_cuti');
    }

    public function store(Request $request){

        // Store bukti cuti
        $file = $request->bukti_cuti;
        $fileExtension = $file->getClientOriginalExtension();
        $filename = $file->storeAs('bukti_cuti', Auth::user()->id . 'bukti_cuti'.$request->tanggal_mulai.'.'.$fileExtension);
        $destinationPath = public_path('/bukti_cuti');
        $file->move($destinationPath, $filename);

        $year = new Carbon($request->tanggal_mulai);
        $inserted_data =[
            'user_id' => Auth::user()->id,
            'jenis_cuti_id' => $request->jenis_cuti_id,
            'status_cuti' => $request->status_cuti,
            'alasan_cuti' => $request->alasan_cuti,
            'durasi_cuti' => $request->durasi_cuti,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'bukti_cuti' => $filename,
            'konfigurasi_cutis_id' => DB::table('konfigurasi_cutis')->where('tahun', $year->year)->first()->id,
        ];

        // dd($inserted_data);

        // Jika sisa cuti lebih dari 0
        if(Auth::user()->sisa_cuti - $request->durasi_cuti >= 0):


            // Update sisa cuti dari user
            DB::table('users')->where('id', Auth::user()->id)->update([
                'sisa_cuti' => DB::table('users')->where('id', Auth::user()->id)->first()->sisa_cuti - $request->durasi_cuti,
            ]);
            RiwayatCuti::create($inserted_data);
            return redirect('/');
        endif;

        // Jika sisa cuti 0
        return redirect(route('pengajuan_cuti'))->with('error', 'Sisa cuti anda tidak mencukupi');

    }

}
