@extends('admin.layouts.main')

@section('title-page', 'Tambah Transaksi')
@section('page-heading')
  <h2>Transaksi</h2>
  <p>Tambah data <b>transaksi</b> dengan mengisi forum dibawah</p>
@endsection

@section('page-content')
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card">
        <div class="card-header">
          <h3>Tambah Transaksi</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('transaksi.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="">Pesanan</label>
              <select name="id_pesanan" id="select-search" class="@error('id_pesanan') is-invalid @enderror" required>
                @foreach ($pesanan as $listPesanan)
                  <option value="{{ $listPesanan->id }}" {{ old('id_pesanan') == $listPesanan->id ? 'selected' : '' }}>
                    {{ $listPesanan->mobil->merek->nama . ' ' . $listPesanan->mobil->tipe . ' - ' . $listPesanan->pemesan->nama_lengkap }}
                  </option>
                @endforeach
              </select>
              @error('id_pesanan')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Tanggal Bayar</label>
              <input type="date" name="tanggal_bayar" id="" class="form-control @error('tanggal_bayar') is-invalid @enderror" value="{{ old('tanggal_bayar') }}" required>
              @error('tanggal_bayar')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Total Bayar</label>
              <input type="number" name="total_bayar" id="" class="form-control @error('total_bayar') is-invalid @enderror" value="{{ old('total_bayar') }}" placeholder="Masukkan Total Bayar" required>
              @error('total_bayar')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Status Transaksi</label>
              <select name="status_transaksi" id="" class="form-select @error('status_transaksi') is-invalid @enderror" required>
                <option value="">Pilih Status Transaksi</option>
                <option value="Menunggu Pembayaran" {{ old('status_transaksi') == 'Menunggu Pembayaran' ? 'selected' : '' }}>Menunggu Pembayaran</option>
                <option value="Pembayaran Sebagian" {{ old('status_transaksi') == 'Pembayaran Sebagian' ? 'selected' : '' }}>Pembayaran Sebagian</option>
                <option value="Lunas" {{ old('status_transaksi') == 'Lunas' ? 'selected' : '' }}>Lunas</option>
              </select>
              @error('status_transaksi')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            {{-- <div class="form-group">
              <input type="text" id="kode_transaksi" name="kode_transaksi" value="{{ str_random(12) }}" class="form-control">
            </div> --}}
            <div class="d-flex justify-content-end align-items-center mt-4">
              <a href="{{ route('transaksi.index') }}" class="btn btn-danger px-3 me-3">Batal</a>
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
  {{-- <script>
    function makeid(length) {
      var result = '';
      var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
      var charactersLength = characters.length;
      for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
      }
      return result;
    }
    document.querySelector('#kode_transaksi').value = makeid(12);
  </script> --}}
@endsection
