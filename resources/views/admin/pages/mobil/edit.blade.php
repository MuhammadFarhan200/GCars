@extends('admin.layouts.main')

@section('title-page', 'Edit Mobil')
@section('page-heading')
  <h2>Mobil</h2>
  <p>Edit data <b>mobil</b> dengan mengubah isi forum dibawah</p>
@endsection

@section('page-content')
  <div class="row mb-5">
    <div class="col-lg-10 mx-auto">
      <div class="card">
        <div class="card-header">
          <h3>Edit Mobil</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('mobil.update', $mobil->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Merek</label>
                    <select name="id_merek" id="select-search" class="@error('id_merek') is-invalid @enderror" required>
                      {{-- <option value="">Pilih Merek</option> --}}
                      @foreach ($mereks as $merek)
                        <option value="{{ $merek->id }}" {{ $mobil->id_merek == $merek->id ? 'selected' : '' }}>{{ $merek->nama }}</option>
                      @endforeach
                    </select>
                    @error('id_merek')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Tipe</label>
                  <input type="text" name="tipe" id="tipe" class="form-control @error('tipe') is-invalid @enderror" value="{{ $mobil->tipe }}" placeholder="Masukkkan tipe mobil" required>
                  @error('tipe')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $mobil->slug }}" disabled>
                  </div>
                </div>
              </div>
            <div class="row justify-content-center">
              <div class="col-6">
                <div class="form-group">
                  <label for="">Warna</label>
                  <input type="text" name="warna" id="warna" class="form-control @error('warna') is-invalid @enderror" value="{{ $mobil->warna }}" placeholder="Masukkkan warna mobil" required>
                  @error('warna')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">Tahun Keluar</label>
                  <select name="tahun_keluar" id="tahun_keluar" class="form-select @error('tahun_keluar') is-invalid @enderror" required>
                      <option {{ $mobil->tahun_keluar ? '' : 'selected' }} hidden>Pilih tahun keluar</option>
                      @php for($i = 1990;$i <= date('Y'); $i++): @endphp
                      <option value="{{ $i }}" {{ $mobil->tahun_keluar == $i ? 'selected' : '' }}>{{ $i }}</option>
                      @php endfor; @endphp
                    </select>
                  @error('tahun_keluar')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Harga</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ $mobil->harga }}" placeholder="Masukkkan harga mobil" required>
                  </div>
                  @error('harga')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Status</label>
                  <select name="status" id="" class="form-select" required>
                    <option value="tersedia" {{ $mobil->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="sold out" {{ $mobil->status == 'sold out' ? 'selected' : '' }}>Sold out</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="">Deskripsi</label>
              @error('deskripsi')
                <p class="text-danger">
                  {{ $message }}
                </p>
              @enderror
              <textarea name="deskripsi" id="myeditorinstance">{{ $mobil->deskripsi }}</textarea>
            </div>
            <div class="d-flex justify-content-end align-items-center mt-4">
              <a href="{{ route('mobil.index') }}" class="btn btn-danger px-3 me-3">Batal</a>
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
    document.querySelector('#tipe').addEventListener('input', function() {
      var e = document.getElementById("select-search");
      var text = e.options[e.selectedIndex].text.toLowerCase().trim()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_-]+/g, '-')
        .replace(/^-+|-+$/g, '');
      document.querySelector('#slug').value = text + '-' + this.value.toLowerCase()
        .trim()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_-]+/g, '-')
        .replace(/^-+|-+$/g, '');
    });
  </script>
@endsection
