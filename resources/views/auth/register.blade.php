@extends('layouts.app')

@section('content')
<div class="wrapper p-20 h-[120vh]">
    <div class="m-auto w-[380px] border-solid rounded-xl bg-white border-2 font-poppins drop-shadow-2xl">
        <div class="text-center text-xl rounded-t-xl mb-2 font-semibold bg-[#11386d] text-white leading-[75px]">Registration Form</div>
        <form action="{{ route('register') }}" method="post" class="flex flex-col pt-[10px] px-[30px] pb-[50px]">
            @csrf
            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <input class="h-[100%] w-[100%] text-[17px] pl-[20px] border-solid border-[1px] border-gray-600 rounded-[25px] peer @error('nik') invalid:border-pink-800 invalid:text-pink-800 @enderror" type="text" required placeholder="NIK" name="nik"></input>
            </div>
            @error('nik')
            <p class="mt-2 text-pink-800 text-sm">
                NIK salah atau telah digunakan
              </p>
            @enderror
            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <input class="h-[100%] w-[100%] text-[17px] pl-[20px] border-solid border-[1px] border-gray-600 rounded-[25px] @error('nip') invalid:border-pink-800 invalid:text-pink-800 @enderror" type="text" required placeholder="Nomor Induk Pegawai" name="nip"></input>
            </div>
            @error('nip')
            <p class="mt-2 text-pink-800 text-sm">
                NIP salah atau telah digunakan
              </p>
            @enderror
            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <input class="h-[100%] w-[100%] text-[17px] pl-[20px] border-solid border-[1px] border-gray-600 rounded-[25px] @error('nama') invalid:border-pink-800 invalid:text-pink-800 @enderror" type="text" required placeholder="Nama" name="nama"></input>
            </div>
            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <input class="h-[100%] w-[100%] text-[17px] pl-[20px] border-solid border-[1px] border-gray-600 rounded-[25px] @error('alamat') invalid:border-pink-800 invalid:text-pink-800 @enderror" type="text" required placeholder="Alamat" name="alamat"></input>
            </div>
            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <select name="jenis_kelamin" id="jenis_kelamin" class="h-[100%] w-[100%] text-[17px] pl-[20px] border-solid border-[1px] border-gray-600 rounded-[25px] ">
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <select name="department_id" id="department_id"  class="h-[100%] w-[100%] text-[17px] pl-[20px] border-solid border-[1px] border-gray-600 rounded-[25px] ">
                    <option value="1">Informatika</option>
                    <option value="2">Matematika</option>
                    <option value="3">Fisika</option>
                    <option value="4">Biologi</option>
                    <option value="5">Statistika</option>
                    <option value="5">Kimia</option>
                </select>
            </div>
            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <input class="h-[100%] w-[100%] text-[17px] pl-[20px] border-solid border-[1px] border-gray-600 rounded-[25px] @error('email') invalid:border-pink-800 invalid:text-pink-800 @enderror"  type="text" required placeholder="Email" name="email"></input>
            </div>
            @error('email')
            <p class="mt-2 text-pink-800 text-sm">
                Format email salah atau email telah digunakan
            </p>
            @enderror
            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <input class="h-[100%] w-[100%] text-[17px] pl-[20px] border-solid border-[1px] border-gray-600 rounded-[25px] @error('password') invalid:border-pink-800 invalid:text-pink-800 @enderror" type="password" required placeholder="Password" name="password"></input>
            </div>
            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <input type="submit" value="Register" class="mt-[-10px] text-xl font-semibold bg-[#11386d] text-white text-center rounded-[25px] w-[100%] mx-auto py-1 cursor-pointer"></input>
                <div class="signup-link mt-[20px] text-center">Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Sign in</a></div>
            </div>
        </form>
    </div>
</div>
@endsection
