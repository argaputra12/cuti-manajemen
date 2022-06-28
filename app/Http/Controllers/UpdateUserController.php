<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Svg\Tag\Rect;

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
        $request->validate([
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


        return back();
    }

    public function index(Request $request)
    {

        // Get user data

        if ($request->has('search')) {
            $user_data = DB::table('users')
                ->where('users.nama', 'like', '%' . $request->search . '%')
                ->select('users.id', 'users.nip', 'users.nama', 'users.alamat', 'users.department_id', 'departments.nama as nama_department', 'users.sisa_cuti', 'users.is_admin')
                ->join('departments', 'users.department_id', '=', 'departments.id')
                ->paginate(10);
        } else {
            $user_data = DB::table('users')
                ->select('users.id', 'users.nip', 'users.nama', 'users.alamat', 'users.department_id', 'departments.nama as nama_department', 'users.sisa_cuti', 'users.is_admin')
                ->join('departments', 'users.department_id', '=', 'departments.id')
                ->paginate(10);
        }

        $department_data = DB::table('departments')
            ->select('departments.id', 'departments.nama')
            ->get();

        return view('/manajemen_user', compact('user_data', 'department_data'));
    }


    public function deleteUser(Request $request)
    {

        // Delete user data
        DB::table('users')
            ->where('id', $request->id)
            ->delete();

        return back();
    }
    public function editUser(Request $request)
    {

        // update user data
        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'department_id' => $request->prodi,
                'sisa_cuti' => $request->sisa_cuti,
            ]);

        return back();
    }

    public function changeRoleToAdmin(Request $request)
    {

        // update user data
        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'is_admin' => 1,
            ]);

        return back();
    }

    public function changeRoleToUser(Request $request)
    {

        // update user data
        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'is_admin' => 0,
            ]);

        return back();
    }


    public function statistik(Request $request){
        // Get user riwayat cuti
        $riwayat_cuti = DB::table('riwayat_cutis')
        ->join('jenis_cutis', 'riwayat_cutis.jenis_cuti_id', '=', 'jenis_cutis.id')
        ->select(DB::raw('COUNT(riwayat_cutis.id) as jumlah_cuti'), 'riwayat_cutis.user_id' , 'jenis_cutis.nama as nama_cuti')
        ->where('riwayat_cutis.user_id', $request->id)
        ->groupBy('jenis_cutis.nama')
        ->groupBy('riwayat_cutis.user_id')
        ->get();

        // dd($riwayat_cuti);

        return response()->json($riwayat_cuti);
    }
}
