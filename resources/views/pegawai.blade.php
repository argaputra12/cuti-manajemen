@extends('layouts/main')
      
@section('container')
      
      
<a class="btn btn-success" href="/tambahpegawai" role="button">Tambah data</a>
          <div class="row">
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">id</th>
                          <th scope="col">NIK</th>
                          <th scope="col">No Induk</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">Jenis Kelamin</th>
                          <th scope="col">No Telepon</th>
                          <th scope="col">Created at</th>
                          <th scope="col">Edited at</th>
                          <th scope="col">Aksi</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $p)
                        <tr>
                            <th scope="row">{{$p->id}}</th>
                            <td scope="row">{{ $p->nik }}</td>
                            <td scope="row">{{ $p->no_induk }}</td>
                            <td scope="row">{{ $p->nama }}</td>
                            <td scope="row">{{ $p->alamat}}</td>
                            <td scope="row">{{ $p->jenis_kelamin}}</td>
                            <td scope="row">{{ $p->telepon}}</td>
                            <td scope="row">{{ $p->created_at}}</td>
                            <td scope="row">{{ $p->updated_at }}</td>
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