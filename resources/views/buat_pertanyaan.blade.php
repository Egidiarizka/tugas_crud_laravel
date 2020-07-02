@extends('master')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Buat pertanyaan baru</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form action="{{ route('pertanyaan.store') }}" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" class="form-control">
      </div>
      <div class="form-group">
        <label for="isi">Isi</label>
        <input type="text" name="isi" id="isi" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <!-- /.card-body -->
</div>
@endsection