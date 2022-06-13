<?php

namespace App\Http\Controllers;

use App\Models\RiwayatCuti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengajuanCutiController extends Controller
{
    //
    public function index(){
        return view('pengajuan_cuti');
    }

    public function store(Request $request){
        
        RiwayatCuti::create($request->except('_token'));
        return redirect('/');
    }

}
