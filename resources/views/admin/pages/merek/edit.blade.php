@extends('admin.layouts.main')

@section('title-page', 'Edit Merek')
@section('page-heading')
  <h2>Merek</h2>
  <p>Edit data <b>merek</b> dengan mengubah data pada forum dibawah</p>
@endsection

@section('page-content')
  <div class="row mb-5">
    <div class="col-lg-8 mx-auto">
      <div class="card shadow">
        <div class="card-header">
          <h3>Edit Data Merek</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('merek.update', $merek->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="">Nama Merek</label>
              <input type="text" name="nama" id="nama" value="{{ $merek->nama }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama Merek" required>
              @error('nama')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Slug</label>
              <input type="text" name="slug" id="slug" value="{{ $merek->slug }}" class="form-control @error('slug') is-invalid @enderror" required readonly>
              @error('slug')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="d-flex justify-content-end align-items-center mt-4">
              <a href="{{ route('merek.index') }}" class="btn btn-secondary px-3 me-3">Batal</a>
              <button type="submit" class="btn btn-primary px-3">
                Edit
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
