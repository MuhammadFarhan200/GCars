@extends('admin.layouts.main')

@section('title-page', 'Edit Merek')
@section('page-heading')
  <h2>Merek</h2>
  <p>Lihat salah satu data <b>merek</b> pada forum dibawah</p>
@endsection

@section('page-content')
  <div class="row mb-5">
    <div class="col-lg-8 mx-auto">
      <div class="card shadow">
        <div class="card-header">
          <h3>Show Data Merek</h3>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="">Nama Merek</label>
            <input type="text" name="nama" id="nama" value="{{ $merek->nama }}" class="form-control" readonly>
            @error('nama')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ $merek->slug }}" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="">Jumlah mobil dengan merek <b>{{ $merek->nama }}</b></label>
            <input type="number" class="form-control" value="{{ $merek->mobil->count() }}" id="" readonly>
          </div>
          <div class="d-flex justify-content-end align-items-center mt-4">
            <a href="{{ route('merek.edit', $merek->id) }}" class="btn btn-primary px-3 me-3">Edit</a>
            <a href="{{ route('merek.index') }}" class="btn btn-secondary px-3">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('myScript')
  <script>
    document.querySelector('#nama').addEventListener('input', function() {
      document.querySelector('#slug').value = this.value.toLowerCase()
        .trim()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_-]+/g, '-')
        .replace(/^-+|-+$/g, '');
    });
  </script>
@endsection
