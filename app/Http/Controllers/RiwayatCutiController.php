<?php

namespace App\Http\Controllers;

use App\Models\RiwayatCuti;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RiwayatCutiController extends Controller
{
    public function index()
    {
        $data = RiwayatCuti::All();
        
        return view('riwayatcuti', compact('data'), [
            'title' => 'Riwayat Cuti',
            'content' => 'Ini adalah halaman riwayat cuti'
        ]);
    }
}
