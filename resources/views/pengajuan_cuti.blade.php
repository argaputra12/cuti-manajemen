@extends('layouts.main')

@section('head')

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./assets/css/pengajuan_cuti.css" type="text/css" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- <link rel="stylesheet" href="./assets/css/output.css" /> -->
        <link rel="stylesheet" href="./assets/css/fonts.css" />
        <script src="assets/js/dashboard.js"></script>
        <script src="https://kit.fontawesome.com/6ba9b8f714.js" crossorigin="anonymous"></script>
        <title>SIPALING | Pengajuan Cuti</title>
    </head>
@endsection

@section('content')
    <div class="main-content height-80">
        <!-- taruh sini -->

        <div class="box-content-css algn-mid flex-col-css">
            <div class="welcome-text">
                <span>Pengajuan Cuti</span>
            </div>
            <div class="form-wrapper">
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <form class="form-control-css" action="/pengajuan_cuti" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name='user_id' value={{ Auth::user()->id }}>
                        <label for="">Jenis Cuti</label>
                        <select name="jenis_cuti_id" id="jenis-cuti" required>
                            <option value="1">Cuti Besar</option>
                            <option value="2">Cuti Tahunan</option>
                            <option value="3">Cuti Sakit</option>
                            <option value="4">Cuti Melahirkan</option>
                            <option value="5">Cuti karena alasan penting</option>
                            <option value="6">Cuti di luar tanggungan perusahaan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name='status_cuti' value="Waiting">
                        <label for="alasan_cuti">Alasan cuti</label>
                        <input type="text" name="alasan_cuti" required>
                        @error('alasan_cuti')
                            <p class="mt-2 text-pink-800 text-sm">
                                Input field harus diisi!
                            </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="durasi_cuti">Durasi cuti</label>
                        <input type="number" placeholder="Hari" name="durasi_cuti" min="1" required>
                        @error('durasi_cuti')
                            <p class="mt-2 text-pink-800 text-sm">
                                Input field harus diisi!
                            </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal mulai cuti</label>
                        <input type="date" name="tanggal_mulai" required>
                        @error('tanggal_mulai')
                            <p class="mt-2 text-pink-800 text-sm">
                                Input field harus diisi!
                            </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_selesai">Tanggal selesai cuti</label>
                        <input type="date" name="tanggal_selesai" required>
                        {{-- <input type="hidden" name="konfigurasi_cutis_id" value={{ DB::table('konfigurasi_cutis')->where('tahun', now()->format('Y'))->first()->id }}> --}}
                        @error('tanggal_selesai')
                            <p class="mt-2 text-pink-800 text-sm">
                                Input field harus diisi!
                            </p>
                        @enderror
                    </div>
                    <input type="submit" value="Ajukan Cuti" class="btn-css ajukan-cuti bg-blue-500 hover:bg-blue-800">
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
