@extends('master')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Pertanyaan</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-striped">
      <tbody>
        <tr>
          <td>Judul</td>
          <td>{{$pertanyaan->judul}}</td> 
        </tr>
         <tr>
          <td>Isi</td>
          <td>{{$pertanyaan->isi}}</td> 
        </tr>
         <tr>
          <td>Tanggal_dibuat</td>
          <td>{{$pertanyaan->tanggal_dibuat}}</td> 
        </tr>
         <tr>
          <td>Tanggal_diperbaruhi</td>
          <td>{{$pertanyaan->tanggal_diperbaruhi}}</td> 
        </tr>
            
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Jawaban</h3>
  </div>
  <div class="card-body">
    
     <table class="table table-striped">
      <tbody>
        
            @foreach($jawaban as $jwb)
            <tr>
              <td colspan="2">{{ $jwb->isi }}</td>
            </tr>
            @endforeach
      </tbody>
    </table>

  </div>
</div>
@endsection