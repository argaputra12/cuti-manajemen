@extends('layouts.main')

@section('container')
<button type="button" class="btn btn-success my-1">Tambah Data</button>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Status Cuti</th>
                <th scope="col">Bukti Pengajuan</th>
                <th scope="col">Tanggal awal cuti</th>
                <th scope="col">Tanggal akhir cuti</th>
                
              </tr>
          </thead>
          <tbody>
              @foreach($data as $p)
              <tr>
                  <th scope="row">{{$p->id}}</th>
                  <td scope="row">{{ $p->status_cuti }}</td>
                  <td scope="row">{{ $p->path_bukti_pengajuan }}</td>
                  <td scope="row">{{ $p->tgl_awal_cuti }}</td>
                  <td scope="row">{{ $p->tgl_akhir_cuti }}</td>>
                  <td>
                      <button type="button" class="btn btn-danger">Delete</button>
                      <button type="button" class="btn btn-warning">Edit</button>
                  </td>
              </tr>

              @endforeach
                  
          </tbody>
  </table>
</div>
@endsection