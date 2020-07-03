@extends('master')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Update pertanyaan</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    @if(session()->has('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
    @endif
    @if(session()->has('error'))
      <div class="alert alert-danger">
        {{ session()->get('error') }}
      </div>
    @endif
    <form action="{{ route('pertanyaan.update', ['id' => $pertanyaan->id]) }}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="put" />
      <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" class="form-control" value="{{ $pertanyaan->judul }}">
      </div>
      <div class="form-group">
        <label for="isi">Isi</label>
        <input type="text" name="isi" id="isi" class="form-control" value="{{ $pertanyaan->isi }}">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <!-- /.card-body -->
</div>
@endsection