<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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
    public function photo(Request $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $file = $request->image;
        if ($request->hasFile('image')) {
            $filename = $file->storeAs('images', $userId . 'profile.png');
            // dd($filename);
            // $request->image->storeAs('images', $filename, 'public');
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $filename);
            $user->update(['image' => $filename]);
        }
        $user->save();

       
        /* Store $imageName name in DATABASE from HERE */
        return back();
    }
}
