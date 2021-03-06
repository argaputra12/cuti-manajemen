<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nip'=>'required|unique:users',
            'nik'=>'required|unique:users',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'department_id' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {   
        // Jumalh cuti maksimal tahun ini
        $jumlah_cuti_maksimum = DB::table('konfigurasi_cutis')->where('tahun', now()->format('Y'))->first()->jumlah_cuti_maksimum;

        // Jumlah cuti beersama tahun ini
        $jumlah_cuti_bersama = DB::table('konfigurasi_cutis')->where('tahun', now()->format('Y'))->first()->jumlah_cuti_bersama;

        return User::create([
            'nip' => $data['nip'],
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'department_id' => $data['department_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'sisa_cuti' => $jumlah_cuti_maksimum-$jumlah_cuti_bersama,
        ]);

    }
}
