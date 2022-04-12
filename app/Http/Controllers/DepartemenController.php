<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DepartemenController extends Controller
{
    public function index(){
        $data = Departemen::All();
        return view('departemen',compact('data'),[
            'title' => 'Data Departemen',
            'content' => 'Ini adalah halaman data departemen'
        ]);
    }

}
