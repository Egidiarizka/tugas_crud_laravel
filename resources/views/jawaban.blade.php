@extends('master')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Buat Jawaban baru</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form action="{{ route('jawaban.store', ['pertanyaan_id' => $pertanyaan->id]) }}" method="post">
      {{ csrf_field() }}
      <h5 class="text-center">{{ $pertanyaan->judul }}</h5>
      <p class="text-center">{{ $pertanyaan->isi }}</p>
      <br>
      <div class="form-group">
        <label for="isi">Jawaban</label>
        <input type="text" name="jawaban" id="jawaban" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <!-- /.card-body -->
</div>
@endsection