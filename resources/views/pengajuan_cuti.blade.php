@extends('layouts.main')

@section('head')

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./assets/css/pengajuan_cuti.css" type="text/css" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="assets/js/pengajuan_cuti.js"></script>
        <script src="https://kit.fontawesome.com/6ba9b8f714.js" crossorigin="anonymous"></script>
        <title>SIPALING | Pengajuan Cuti</title>
    </head>
@endsection

@section('content')
    <div class="main-content height-80">
        <!-- taruh sini -->

        <div class="box-content-css algn-mid flex-col-css">
            <div class="welcome-text font-semibold text-2xl">
                <span>Pengajuan Cuti</span>
            </div>
            <div class="w-full flex justify-center font-medium text-base">
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <form class="w-2/3" action="/pengajuan_cuti" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 flex flex-col">
                        <input type="hidden" name='user_id' value={{ Auth::user()->id }}>
                        <label for="" class="text-lg mb-1 pl-1">Jenis Cuti</label>
                        <select name="jenis_cuti_id" id="jenis-cuti" required class="h-10 border-2 rounded-lg pl-2">
                            <option value="1">Cuti Besar</option>
                            <option value="2">Cuti Tahunan</option>
                            <option value="3">Cuti Sakit</option>
                            <option value="4">Cuti Melahirkan</option>
                            <option value="5">Cuti karena alasan penting</option>
                            <option value="6">Cuti di luar tanggungan perusahaan</option>
                        </select>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <input type="hidden" name='status_cuti' value="Waiting">
                        <label for="alasan_cuti" class="text-lg mb-1 pl-1">Alasan cuti</label>
                        <input type="text" name="alasan_cuti" required class="h-10 border-2 rounded-lg pl-2">

                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="durasi_cuti" class="text-lg mb-1 pl-1">Durasi cuti</label>
                        <input type="number" placeholder="Hari" name="durasi_cuti" min="1" required class="h-10 border-2 rounded-lg pl-2">

                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="tanggal_mulai" class="text-lg mb-1 pl-1">Tanggal mulai cuti</label>
                        <input type="date" name="tanggal_mulai" required class="h-10 border-2 rounded-lg px-2">

                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="tanggal_selesai" class="text-lg mb-1 pl-1">Tanggal selesai cuti</label>
                        <input type="date" name="tanggal_selesai" required class="h-10 border-2 rounded-lg px-2">
                    </div>
                    <div class="my-3 h-16 flex items-center border-gray-300 border-2 font-medium rounded-lg hover:bg-gray-300 cursor-pointer text-lg">
                        <input accept="application/pdf" type="file" name="bukti_cuti" required class="absolute opacity-0 h-16 w-[1035px]" placeholder="Upload bukti cuti" onchange="changeLabel()">
                        <label for="bukti_cuti" class="label-bukticuti inline-block w-full text-center px-1 text-gray-400">Upload bukti cuti</label>
                    </div>
                    <input type="submit" value="Ajukan Cuti" class="w-full my-4 btn-css ajukan-cuti bg-blue-500 hover:bg-blue-800">
                </form>
            </div>
        </div>
        <div class="box-content-css algn-mid flex-col-css">
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
    const changeLabel = () =>{
        const label = document.querySelector('.label-bukticuti');
        const file = document.querySelector('input[type=file]');
        const fileName = file.value.split('\\').pop();
        label.innerHTML = fileName;
    }
</script>
@endsection
