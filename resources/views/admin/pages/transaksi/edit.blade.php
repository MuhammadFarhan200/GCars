@extends('admin.layouts.main')

@section('title-page', 'Edit Transaksi')
@section('page-heading')
  <h2>Transaksi</h2>
  <p>Edit data <b>transaksi</b> dengan mengisi forum dibawah</p>
@endsection

@section('page-content')
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card">
        <div class="card-header">
          <h3>Edit Transaksi</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="">Pesanan</label>
              <select name="id_pesanan" id="select-search" class="@error('id_pesanan') is-invalid @enderror" required>
                <option value="">Pilih Pesanan</option>
                @foreach ($pesanan as $listPesanan)
                  <option value="{{ $listPesanan->id }}" {{ $transaksi->id_pesanan == $listPesanan->id ? 'selected' : '' }}>
                    {{ $listPesanan->mobil->tipe . ' - ' . $listPesanan->pemesan->nama_lengkap }}
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
                <label for="" class="d-block">Total Bayar</label>
                <input type="number" name="total_bayar" id="" class="form-control @error('total_bayar') is-invalid @enderror" value="{{ $transaksi->total_bayar }}" placeholder="Masukkan Total Pembayaran Baru">
                @error('total_bayar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
              <label for="">Tanggal Bayar</label>
              <input type="date" name="tanggal_bayar" id="" class="form-control @error('tanggal_bayar') is-invalid @enderror" value="{{ $transaksi->tanggal_bayar }}" required>
              @error('tanggal_bayar')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Status Transaksi</label>
              <select name="status_transaksi" id="" class="form-select @error('status_transaksi') is-invalid @enderror" required>
                <option value="">Pilih Status Transaksi</option>
                <option value="Menunggu Pembayaran" {{ $transaksi->status_transaksi == 'Menunggu Pembayaran' ? 'selected' : '' }}>Menunggu Pembayaran</option>
                <option value="Pembayaran Sebagian" {{ $transaksi->status_transaksi == 'Pembayaran Sebagian' ? 'selected' : '' }}>Pembayaran Sebagian</option>
                <option value="Lunas" {{ $transaksi->status_transaksi == 'Lunas' ? 'selected' : '' }}>Lunas</option>
              </select>
              @error('status_transaksi')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="d-flex justify-content-end align-items-center mt-4">
              <a href="{{ route('transaksi.index') }}" class="btn btn-danger px-3 me-3">Batal</a>
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
