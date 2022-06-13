@extends('layouts.main')

@section('head')
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/css/pengajuan_cuti.css" type="text/css" />
  <!-- <link rel="stylesheet" href="./assets/css/output.css" /> -->
  <link rel="stylesheet" href="./assets/css/fonts.css" />
  <script src="assets/js/dashboard.js"></script>
  <script
    src="https://kit.fontawesome.com/6ba9b8f714.js"
    crossorigin="anonymous"
  ></script>
  <title>SIPALING | Pengajuan Cuti</title>
</head>
@endsection

@section('content')
<div class="main-content height-80">
  <!-- taruh sini -->
  
  <div class="box-content algn-mid flex-col">
    <div class="welcome-text">
        <span>Pengajuan Cuti</span>
    </div>
    <div class="form-wrapper">
        <form class="form-control" action="/pengajuan_cuti" method="post">
          @csrf
          <div class="form-group">
            <input type="hidden" name='user_id' value={{ Auth::user()->id }}>
            <label for="">Jenis Cuti</label>
              <select name="jenis_cuti_id" id="jenis-cuti">
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
              <input type="text" name="alasan_cuti">
          </div>
          <div class="form-group">
              <label for="durasi_cuti">Durasi cuti</label>
              <input type="number" placeholder="Hari" name="durasi_cuti" min="1">
          </div>
          <div class="form-group">
              <label for="tanggal_mulai">Tanggal mulai cuti</label>
              <input type="date" name="tanggal_mulai">
          </div>
          <div class="form-group">
              <label for="tanggal_selesai">Tanggal selesai cuti</label>
              <input type="date" name="tanggal_selesai">
          </div>
          <input type="submit" value="Ajukan Cuti" class="btn ajukan-cuti">
        </form>
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
@endsection