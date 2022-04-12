@extends('layouts.main')
@section('container')
<div class="card w-25 mx-auto my-5">
  <div class="card-body">
    <h4 class="text-center my-2">Masukkan Data</h4>
    
    <form action="/insertdata" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="nik"  class="form-label">NIK</label>
        <input type="text" name="nik" class="form-control" id="inputnik">
      </div>
      <div class="mb-3">
        <label for="no_induk" class="form-label">No Induk</label>
        <input type="text" name="no_induk" class="form-control" id="inputnoinduk">
      </div>
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" id="inputnama">
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" name="alamat" class="form-control" id="inputalamat">
      </div>
            <div class="mb-3">
              <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
              <select class="form-select" name="jenis_kelamin" placeholder="Pilih jenis kelamin">
                <option selected>Pilih jenis kelamin</option>
                <option value="l">L</option>
                <option value="p">P</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="telepon" class="form-label">No Telp</label>
              <input type="text" name="telepon" class="form-control" id="inputtelepon">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        
        
        @endsection