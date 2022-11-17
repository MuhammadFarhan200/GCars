@extends('admin.layouts.main')

@section('title-page', 'Tambah Mobil')
@section('page-heading')
  <h2>Mobil</h2>
  <p>Tambah data <b>merek</b> dengan mengisi forum dibawah</p>
@endsection

@section('page-content')
  <div class="row mb-5">
    <div class="col-lg-10 mx-auto">
      <div class="card shadow">
        <div class="card-header">
          <h3>Tmabah Data Mobil</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('mobil.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="">Merek</label>
              <select name="id_merek" id="" class="form-select">
                @foreach ($mereks as $merek)
                    <option value="{{ $merek->id }}">{{ $merek->nama }}</option>
                @endforeach
              </select>
              @error('id_merek')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Tipe</label>
              <input type="text" name="tipe" id="tipe" class="form-control @error('tipe') is-invalid @enderror" required>
              @error('tipe')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Tahun Keluar</label>
              <select name="tahun_keluar" id="tahun_keluar" class="form-control @error('tahun_keluar') is-invalid @enderror" required>
                <option {{ old('tahun_keluar') ? '' : 'selected' }} hidden>Pilih tahun keluar</option>
                @php for($i = 1990;$i <= 2022; $i++) : @endphp
                  <option value="{{ $i }}" {{ old('tahun_keluar') == $i ? 'selected' : '' }}>{{ $i }}</option>
                @php endfor; @endphp
              </select>
              @error('tahun_keluar')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="d-flex justify-content-end align-items-center mt-4">
              <a href="{{ route('mobil.index') }}" class="btn btn-secondary px-3 me-3">Batal</a>
              <button type="submit" class="btn btn-primary px-3">
                Tambah
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

