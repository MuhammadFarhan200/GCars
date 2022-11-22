@extends('admin.layouts.main')

@section('title-page', 'Tambah Mobil')
@section('page-heading')
  <h2>Mobil</h2>
  <p>Tambah data <b>mobil</b> dengan mengisi forum dibawah</p>
@endsection

@section('page-content')
  <div class="row mb-5">
    <div class="col-lg-10 mx-auto">
      <div class="card">
        <div class="card-header">
          <h3>Tambah Mobil</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('mobil.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="">Merek</label>
              <select name="id_merek" id="" class="form-select @error('id_merek') is-invalid @enderror" required>
                <option value="">Pilih Merek</option>
                @foreach ($mereks as $merek)
                    <option value="{{ $merek->id }}" {{ old('id_merek') == $merek->id ? 'selected' : '' }}>{{ $merek->nama }}</option>
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
              <input type="text" name="tipe" id="tipe" class="form-control @error('tipe') is-invalid @enderror" value="{{ old('tipe') }}" placeholder="Masukkkan tipe mobil" required>
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
            <div class="form-group">
              <label for="">Warna</label>
              <input type="text" name="warna" id="warna" class="form-control @error('warna') is-invalid @enderror" value="{{ old('warna') }}" placeholder="Masukkkan warna mobil" required>
              @error('warna')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Harga</label>
              <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" placeholder="Masukkkan harga mobil" required>
              @error('harga')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Status</label>
              <select name="status" id="" class="form-select" required>
                <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="sold out" {{ old('status') == 'sold out' ? 'selected' : '' }}>Sold out</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Deskripsi</label>
              @error('deskripsi')
                <p class="text-danger">
                  {{ $message }}
                </p>
              @enderror
              <textarea name="deskripsi" id="myeditorinstance">{{ old('deskripsi') }}</textarea>
            </div>
            <div class="d-flex justify-content-end align-items-center mt-4">
              <a href="{{ route('mobil.index') }}" class="btn btn-danger px-3 me-3">Batal</a>
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

