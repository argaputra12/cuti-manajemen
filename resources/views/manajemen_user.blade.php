@extends('layouts.main')

@section('head')
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="assets/css/dashboardprofile.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/fonts.css">

        {{-- ini tailwindcss --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script type="text/javascript" src="assets/js/dashboard.js"></script>
        <script src="https://kit.fontawesome.com/6ba9b8f714.js" crossorigin="anonymous"></script>
        <title>SIPALING | Manajemen User</title>
    </head>
@endsection

@section('content')
    <div class="main-content height-80">
        <div class="box-content-css flex-col">
            <div class="leading-[2.2em] border-y-2 border-x-[#cdcdcd] py-3 mb-2">
                <h2 class="font-semibold text-2xl font-poppins">Manajemen Pegawai</h2>
            </div>
            <div class="daftar-container min-h-[450px]">
                <div class="daftar-table ">
                    <div class="table-header items-center border-b-4 pb-2 font-poppins text-sm flex justify-between h-7 font-medium text-center mb-4">
                        <div class="w-12 text-center">NIP</div>
                        <div class="w-[300px]">Nama</div>
                        <div class="w-[130px]"> Prodi</div>
                        <div class="w-[350px]">Alamat</div>
                        <div class="w-20">Sisa cuti</div>
                        <div class="w-14">Role</div>
                        <div class="w-[150px] ">Aksi</div>
                </div>
                @foreach ($user_data as $user)

                <div class="table-body border-b-2 font-poppins text-sm flex justify-between h-16  text-left items-center overflow-hidden">
                    <div class="w-12 text-center hidden id">{{ $user->id }}</div>
                    <div class="w-12 text-center hidden is_admin">{{ $user->is_admin }}</div>
                    <div class="w-12 text-center nip">{{ $user->nip }}</div>
                    <div class="w-[300px] nama">{{ $user->nama }}</div>
                    <div class="w-[130px] prodi">{{ $user->nama_department }}</div>
                    <div class="w-[350px] h-5 overflow-clip alamat">{{ $user->alamat }}</div>
                    <div class="w-20 text-center sisa_cuti">{{ $user->sisa_cuti }}</div>
                    <div class="role w-14 flex justify-center">
                        @if ($user->is_admin == 1)
                        Admin
                        @else
                        Pegawai
                        @endif
                    </div>
                    <div class="w-[150px] flex justify-evenly">

                        @if ($user->is_admin == 1)
                        {{-- Change role to user --}}
                        <form action="{{ route('manajemen_user.change_role.user') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button class="lock-open">
                                <i class="fa-solid fa-lock-open fa-xl"></i>
                            </button>
                        </form>

                        @else
                        {{-- Change role to admin --}}
                        <form action="{{ route('manajemen_user.change_role.admin') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" class="lock">
                                <i class="fa-solid fa-lock fa-xl"></i>
                            </button>
                        </form>
                        @endif

                        {{-- Edit user --}}
                        <button class="edit" onclick="showModalEditUser(this.parentElement.parentElement)">
                            <i class="fa-solid fa-pen-to-square fa-xl"></i>
                        </button>

                        {{-- Delete user --}}
                        <form action="{{ route('manajemen_user.delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button class="delete" type="submit">
                                <i class="fa-solid fa-trash-can fa-xl"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="hidden modal-edit-user fixed w-full h-full bg-slate-800 bg-opacity-50 z-50 inset-0 flex justify-center items-center">
                <div class="modal-conainer w-1/3 bg-white py-8 rounded-xl flex flex-col items-center">
                    <div class="w-full flex justify-end px-10">
                        <button onclick="closeEditModal()">
                            <i class="text-darkred fa-solid fa-xmark fa-2xl"></i>
                        </button>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-700 mb-5">UPDATE USER DATA</h3>
                    <form action="{{ route('manajemen_user.edit') }}"  method="POST" class="w-3/4 mx-auto text-base">
                        @csrf
                        <input type="text" hidden name="id" id="id" value="">
                        <input type="text" hidden name="is_admin" id="is_admin" >
                        <div class="mb-6">
                            <input type="text" name="nip" id="nip" placeholder="" class="rounded-lg border-2 w-full h-10 px-2">
                        </div>
                        <div class="mb-6">
                            <input type="text" name="nama" id="nama" placeholder="" class="rounded-lg border-2 w-full h-10 px-2">
                        </div>
                        <div class="mb-6 rounded-lg w-full">
                            <select name="prodi" id="prodi" class="text-gray-700 border-2 h-10 rounded-lg flex w-full px-1">
                                <option  class="block w-full text-gray-200 placeholder">Pilih Prodi</option>
                                @foreach ($department_data as $department)
                                <option class="block w-full text-slate-700" value="{{ $department->id }}">{{ $department->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-6">
                            <input type="text" name="alamat" id="alamat" placeholder="" class="rounded-lg border-2 w-full h-10 px-2">
                        </div>
                        <div class="mb-6">
                            <input type="text" name="sisa_cuti" id="sisa_cuti" placeholder="" class="rounded-lg border-2 w-full h-10 px-2">
                        </div>
                        <div class="submit-button-container w-full flex justify-center">
                            <button type='submit' class="w-[90px] h-[50px] bg-darkblue text-white rounded-xl hover:bg-darkblue hover:bg-opacity-90 ">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="box-content-css algn-mid flex-col">
            <div class="footer">
                <h1 class="ft-title font-bold"><img src="./assets/logo/logo.svg" alt="" class="ft-logo"> SIPALING
                </h1>
                <p>Data Pegawai</p>
                <p>©2022 Informatika UNS, All Rights Reserved.</p>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const showModalEditUser = (e) =>{
            var inputId = e.querySelector('.id');
            var inputNip = e.querySelector('.nip');
            var inputNama = e.querySelector('.nama');
            var inputProdi = e.querySelector('.prodi');
            var inputAlamat = e.querySelector('.alamat');
            var inputSisaCuti = e.querySelector('.sisa_cuti');
            var inputIsAdmin = e.querySelector('.is_admin');


            const modalEditUser = document.querySelector('.modal-edit-user')
            modalEditUser.querySelector('#id').value = inputId.innerHTML;
            modalEditUser.querySelector('#is_admin').placeholder = inputIsAdmin.innerHTML;
            modalEditUser.querySelector('#nip').placeholder = inputNip.innerHTML;
            modalEditUser.querySelector('#nama').placeholder = inputNama.innerHTML;
            modalEditUser.querySelector('#prodi .placeholder').innerHTML = inputProdi.innerHTML;
            modalEditUser.querySelector('#alamat').placeholder = inputAlamat.innerHTML;
            modalEditUser.querySelector('#sisa_cuti').placeholder = inputSisaCuti.innerHTML;
            modalEditUser.classList.remove('hidden')
        }

        const closeEditModal = () =>{
            const modalEditUser = document.querySelector('.modal-edit-user')
            modalEditUser.classList.add('hidden')
        }
    </script>
@endsection
