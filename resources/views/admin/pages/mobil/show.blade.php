@extends('admin.layouts.main')

@s@section('title-page', 'Detail Mobil')
@section('page-heading')
  <h2>Mobil</h2>
  <p>Lihat salah satu data <b>mobil</b> dibawah ini</p>
@endsection

@section('page-content')
  <div class="row mb-5">
    <div class="col-lg-10 mx-auto">
      <div class="card shadow">
        <div class="card-header">
          <h3>Detail Mobil</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table cellpadding="10px">
              <tbody>
                <tr>
                  <th>Merek</th>
                  <td>{{ $mobil->merek->nama }}</td>
                </tr>
                <tr>
                  <th>Tipe</th>
                  <td>{{ $mobil->tipe }}</td>
                </tr>
                <tr>
                  <th>Tahun Keluar</th>
                  <td>{{ $mobil->tahun_keluar }}</td>
                </tr>
                <tr>
                  <th>Warna</th>
                  <td>{{ $mobil->warna }}</td>
                </tr>
                <tr>
                  <th>Harga</th>
                  <td>Rp{{ number_format($mobil->harga, 2, ',', '.') }}</td>
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
                <tr>
                  {{-- <td colspan="2">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="false">
                      <div class="carousel-inner">
                        @foreach ($gambar as $listGambar)
                          <div class="carousel-item active">
                            <img src="{{ url('images/mobil/' . $listGambar->gambar) }}" alt="" srcset="" class="d-block w-100">
                          </div>
                        @endforeach
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                  </td> --}}
                </tr>
              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-end align-items-center mt-4">
            <a href="{{ route('mobil.index') }}" class="btn btn-danger me-3">Kembali</a>
            <a href="{{ route('mobil.edit', $mobil->id) }}" class="btn btn-primary">Edit Detail</a>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <div class="card-header">
          <h3>Gambar Mobil</h3>
        </div>
        <div class="card-body">
          <div class="scroll-horizontal">
            @if ($gambar->count() < 1)
              <p class="text-center">Gambar belum ditambahkan!</p>
            @else
              @foreach ($gambar as $listGambar)
                <img src="{{ url('images/mobil/' . $listGambar->gambar) }}" alt="" srcset="" class="d-inline-block w-75 mx-2">
              @endforeach
            @endif
          </div>
          <div class="d-flex justify-content-end align-items-center mt-4">
            <a href="{{ route('tambahGambar.index', $mobil->id) }}" class="btn btn-primary">Edit Gambar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
