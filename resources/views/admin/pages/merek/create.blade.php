@extends('admin.layouts.main')

@section('title-page', 'Tambah Merek')
@section('page-heading')
  <h2>Merek</h2>
  <p>Tambah data <b>merek</b> dengan mengisi forum dibawah</p>
@endsection

@section('page-content')
  <div class="row mb-5">
    <div class="col-lg-8 mx-auto">
      <div class="card">
        <div class="card-header">
          <h3>Tambah Merek</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('merek.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="">Nama Merek</label>
              <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama Merek" required>
              @error('nama')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Slug</label>
              <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" required disabled>
              @error('slug')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="d-flex justify-content-end align-items-center mt-4">
              <a href="{{ route('merek.index') }}" class="btn btn-danger px-3 me-3">Batal</a>
              <button type="submit" class="btn btn-primary px-3">
                Simpan
              </button>
            </div>
          </form>
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

