@extends('admin.layouts.main')

@section('title-page', 'Detail Mobil')
@section('page-heading')
  <h2>Mobil</h2>
  <p>Lihat salah satu data <b>mobil</b> dibawah ini</p>
@endsection

@section('page-content')
  <div class="row mb-5">
    <div class="col-lg-10 mx-auto">
      <div class="card">
        <div class="card-header">
          <h3>Detail Mobil</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table cellpadding="7px">
              <tbody>
                <tr>
                  <th>Merek</th>
                  <td>
                    <a href="{{ route('merek.show', $mobil->merek->id) }}" class="text-primary">{{ $mobil->merek->nama }}</a>
                  </td>
                </tr>
                <tr>
                  <th>Tipe</th>
                  <td>{{ $mobil->tipe }}</td>
                </tr>
                <tr>
                <tr>
                  <th>Slug</th>
                  <td>{{ $mobil->slug }}</td>
                </tr>
                <tr>
                  <th>Tahun Keluar</th>
                  <td>{{ $mobil->tahun_keluar }}</td>
                </tr>
                <tr>
                  <th>Warna</th>
                  <td>
                    {{ $mobil->warna }}
                  </td>
                </tr>
                <tr>
                  <th>Harga</th>
                  <td>Rp{{ number_format($mobil->harga, 0, ',', '.') }}</td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td>
                    <div class="badges">
                      <span class="{{ $mobil->status == 'tersedia' ? 'badge bg-primary' : 'badge bg-danger' }}">{{ $mobil->status }}</span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>Deskripsi</th>
                  <td></td>
                </tr>
                <tr>
                  <td colspan="2" class="ps-4">{!! $mobil->deskripsi !!}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-end align-items-center mt-4">
            <a href="{{ route('mobil.index') }}" class="btn btn-secondary me-3">Kembali</a>
            <a href="{{ route('mobil.edit', $mobil->id) }}" class="btn btn-primary me-2"><i class="bi bi-pencil-square me-2"></i>Edit Detail</a>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h3>Gambar Mobil</h3>
        </div>
        <div class="card-body">
          @if ($gambar->count() < 1)
            <p class="text-center fs-5">Gambar belum ditambahkan</p>
          @else
            <div class="owl-carousel owl-theme">
              @foreach ($gambar as $listGambar)
                <img src="{{ $listGambar->image() }}" alt="" srcset="" class="owl-img">
              @endforeach
            </div>
          @endif
          <div class="d-flex justify-content-end align-items-center mt-4">
            <a href="{{ route('tambahGambar.index', $mobil->id) }}" class="btn btn-primary">
              <i class="bi bi-plus-lg"></i> <i class="bi bi-images me-2"></i>
              Edit Gambar
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
