@extends('layouts.main')

@section('head')
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="assets/css/dashboardprofile.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/fonts.css" >
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <script type="text/javascript" src="assets/js/dashboard.js"></script>
    <script src="https://kit.fontawesome.com/6ba9b8f714.js" crossorigin="anonymous"></script>
    <title>SIPALING | Dashboard</title>
</head>
@endsection

@section('content')
<div class="main-content height-80">
    <!-- taruh sini -->
    {{-- <div class="box-content algn-mid flex-col">
      <!-- atau sini -->
      <div class="dashboard-banner"></div>
      <img src="./assets/img/user-placeholder.png" alt="" srcset="" class="user-placeholder">
      <br>
      <div class="welcome-text disp-flex flex-col">
        <span>Selamat Datang!</span>
        @auth
        <span>{{ ucwords(strtolower(auth()->user()->nama)) }}</span>
        
        @endauth
      </div>
    </div> --}}
    <div class="box-content flex-col">
      <span class="fo-w-med fo-st-italic ">Daftar Pengajuan Cuti Anggota <span class="fo-sz-p6 "> 
      </span></span>
      <div class="daftar-container">
        <label>Show</label>
        <select name="show" id="tabel-daftar-pengajuan">
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
        <label>Entries</label>
        <div class="daftar-table">
          
          <table class="table table-bordered">
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
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              
              @if(Auth::user()->is_admin == 1)
                @foreach ($riwayat_cuti as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ ucwords(strtolower(\App\Models\User::where('id', $item->user_id)->pluck('nama')->first()))}}</td>
                    <td>{{ $jenis_cuti[(int)$item->jenis_cuti_id-1]->nama}}</td>
                    <td>{{ $item->alasan_cuti }}</td>
                    <td>{{ $item->durasi_cuti }} Hari</td>
                    <td>{{ $item->tanggal_mulai }}</td>
                    <td>{{ $item->tanggal_selesai }}</td>
                    <td>{{ $item->status_cuti }}</td>
                    <td class="form-button">
                      <form action="{{ route('admin.approvalCuti.approved') }}" method="post" >
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <button type="submit" name="submit" value="Submit" class="bg-none px-2 border-none pointer">
                            <i class="fa-solid fa-check"></i>
                        </button>
                      </form>

                      <form action="{{ route('admin.approvalCuti.refused') }}" method="post" >
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <button type="submit" name="submit" value="Submit" class="bg-none px-5 border-none pointer">
                          <i class="fa-solid fa-xmark"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="8">Tidak ada data</td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
        <div class="daftar-footer disp-flex flex-row">
          <span >Showing 1 to 1 of 1 entries</span>
          <div class="btn-query">            
            <a href="" class="btn">Prev</a>
            <a href="" class="btn">Next</a>
          </div>
        </div>
    </div>
    </div>
    <div class="box-content algn-mid flex-col">
      <div class="footer">
        <h1 class="ft-title"><img src="./assets/logo/logo.svg" alt="" class="ft-logo"> SIPALING</h1>
        <p>Data Pegawai</p>
        <p>©2022 Informatika UNS, All Rights Reserved.</p>
    </div>
    </div>
  </div>
</div>
@endsection