@extends('layouts.main')

@section('head')
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        {{-- <link rel="stylesheet" type="text/css" href="assets/css/dashboardprofile.css" /> --}}
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
        <div class="box-content-css flex-col">
            <span class="fo-w-med fo-st-italic ">Daftar Pengajuan Cuti Anggota <span class="fo-sz-p6 ">
                </span></span>
            <div class="daftar-container h-[450px]">
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
                                <th>Bukti Cuti</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($riwayat_cuti->count()>0)
                            @foreach ($riwayat_cuti as $item)
                            <tr >
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucwords(strtolower($item->nama_user)) }}
                                </td>
                                <td>{{ $item->nama_cuti }}</td>
                                <td>{{ $item->alasan_cuti }}</td>
                                <td>{{ $item->durasi_cuti }} Hari</td>
                                <td>{{ $item->tanggal_mulai }}</td>
                                <td>{{ $item->tanggal_selesai }}</td>
                                <td><a href="{{ $item->bukti_cuti }}" target="_blank">Klik disini</a></td>
                                @if ($item->status_cuti == 'Approved')
                                <td class="alasan_cuti text-green-700">{{ $item->status_cuti }}</td>
                                @elseif ($item->status_cuti == 'Refused')
                                <td class="alasan_cuti text-red-500">{{ $item->status_cuti }}</td>
                                @else
                                <td class="alasan_cuti">{{ $item->status_cuti }}</td>
                                @endif
                                <td class="form-button flex justify-evenly">

                                    <form action="{{ route('admin.approvalCuti.approved') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type="submit" name="submit" value="Submit"
                                            class="bg-none px-2 border-none pointer">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.approvalCuti.refused') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type="submit" name="submit" value="Submit"
                                            class="bg-none px-2 border-none pointer">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="9">Tidak ada data</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $riwayat_cuti->links() }}
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
    </div>

@endsection
