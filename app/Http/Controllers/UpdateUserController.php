<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $this->validate(request(), [
            'nip' => 'required|unique:users,nip,' . $user->id,
            'nik' => 'required|unique:users,nik,' . $user->id,
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'department_id' => 'required',
        ]);
        $user->fill([
            'nip' => $request->nip,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'department_id' => $request->department_id,
        ]);
        $user->save();

        return back();
    }
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'nip' => $data['nip'],
    //         'nik' => $data['nik'],
    //         'nama' => $data['nama'],
    //         'alamat' => $data['alamat'],
    //         'jenis_kelamin' => $data['jenis_kelamin'],
    //         'department_id' => $data['department_id'],
    //     ]);
    // }
}
