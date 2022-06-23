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
        <title>SIPALING | Dashboard</title>
    </head>
@endsection

@section('content')
    <div class="main-content height-80">
        <!-- taruh sini -->
        <div class="box-content-css algn-mid flex-col-css">
            <!-- atau sini -->
            <div class="dashboard-banner"></div>
            @auth
                @if (Auth::user()->image)
                    <img src="{{ asset(Auth::user()->image) }}" alt="profile_image" class="user-placeholder">
                @else
                    <img src="assets/img/user-placeholder.png" alt="user" class="user-placeholder" />
                @endif
            @else
                <img src="assets/img/user-placeholder.png" alt="user" class="user-placeholder" />
            @endauth
            <br>
            <div class="welcome-text disp-flex flex-col-css">
                <span>Selamat Datang!</span>
                @auth
                    <span>{{ ucwords(strtolower(Auth::user()->nama)) }}</span>

                @endauth
            </div>
        </div>
        <div class="box-content-css flex-col-css">
            <span class="fo-w-med fo-st-italic ">Daftar Pengajuan Cuti Anda <span class="fo-sz-p6 "> Daftar Menunggu
                    approval cuti dari atasan
                </span></span>
            <div class="daftar-container">
                <div class="daftar-table">
                    <table class="table-css table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Cuti</th>
                                <th>Alasan Cuti</th>
                                <th>Lama Cuti</th>
                                <th>Dari Tanggal</th>
                                <th>Sampai Dengan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @auth
                                @if ($riwayat_cuti->count() > 0)
                                    @foreach ($riwayat_cuti as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ ucwords(strtolower(Auth::user()->nama)) }}</td>
                                            <td>{{ $jenis_cuti[(int) $item->jenis_cuti_id - 1]->nama }}</td>
                                            <td>{{ $item->alasan_cuti }}</td>
                                            <td>{{ $item->durasi_cuti }} Hari</td>
                                            <td>{{ $item->tanggal_mulai }}</td>
                                            <td>{{ $item->tanggal_selesai }}</td>
                                            @if ($item->status_cuti == 'Approved')
                                                <td style="color: green">
                                                    {{ $item->status_cuti }}
                                                @elseif($item->status_cuti == 'Refused')
                                                <td style="color: red">
                                                    {{ $item->status_cuti }}
                                                @else
                                                <td>
                                                    {{ $item->status_cuti }}
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- {{ $riwayat_cuti->links() }} --}}
                                @else
                                    <tr>
                                        <td colspan="8">Tidak ada data</td>
                                    </tr>
                                @endauth
                            @else
                                <tr>
                                    <td colspan="8">Tidak ada data</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
                <div class="daftar-footer disp-flex flex-row-css">
                </div>
            </div>
            <div class="box-content-css algn-mid flex-col-css">
                <div class="footer">
                    <h1 class="ft-title font-bold"><img src="./assets/logo/logo.svg" alt="" class="ft-logo">
                        SIPALING</h1>
                    <p>Data Pegawai</p>
                    <p>©2022 Informatika UNS, All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
