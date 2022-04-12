@extends('layouts.main')

@section('container')
<button type="button" class="btn btn-success my-1">Tambah Data</button>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
    
                <th scope="col">Nama Departemen</th>
            
                <th scope="col">Aksi</th>
                
              </tr>
          </thead>
          <tbody>
              @foreach($data as $p)
              <tr>
                  <th scope="row">{{$p->id}}</th>
                  <td scope="row">{{ $p->nama }}</td>
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