@extends('master')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}">
@endpush

@section('content')
<div class="card">
      <div class="card-header">
        <h3 class="card-title" style="margin-top: 5px;">Tabel Pertanyaan</h3>
        <a href="{{ route('pertanyaan.create') }}" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i> Buat Soal</a>
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
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Nomor</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Tanggal Dibuat</th>
            <th>Tanggal Diperbaruhi</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach($pertanyaan as $soal)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $soal->judul }}</td>
                <td>{{ $soal->isi }}</td>
                <td>{{ $soal->tanggal_dibuat }}</td>
                <td>{{ $soal->tanggal_diperbaruhi }}</td>
                <td>
                  <a href="{{ route('jawaban.index', ['pertanyaan_id' => $soal->id]) }}" class="btn btn-primary">Jawab Pertanyaan</a>
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Nomor</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Tanggal Dibuat</th>
            <th>Tanggal Diperbaruhi</th>
            <th></th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
@endsection

@push('script')
<script src="{{ asset('js/datatables.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@endpush