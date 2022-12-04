@extends('layouts.main')

@section('page-title', $title)

@section('hero-area')
  <section class="section section-bg" id="call-to-action" style="background-image: url({{ asset('frontend/images/banner-image-1-1920x500.jpg') }})">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="cta-content pt-5">
            <h2 class="text-white">Daftar Pesananmu</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('main-content')
  <section class="section" id="trainers">
    <div class="container">
      <div class="card shadow border-0" style="margin-top: -50px">
        <div class="card-body">
          @if ($filterPesanan->count() < 1)
            <div class="alert alert-info text-center opacity-80">
              <h5>Kamu belum melakukan pesanan apapun!</h5>
            </div>
            <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center">
              <a href="/" class="me-sm-2">Kembali Ke Beranda </a> atau <a href="/mobil" class="ms-sm-2"> Pesan Mobil Sekarang!</a>
            </div>
          @else
            <div class="table-responsive">
              <table class="table table-hover text-center">
                <thead class="text-nowrap">
                  <tr>
                    <th>#</th>
                    <th>Id Pesanan</th>
                    <th>Mobil yang Dipesan</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Status Pesanan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($filterPesanan as $index => $pesanan)
                    <tr>
                      <th>{{ $no++ }}</th>
                      <td>{{ $pesanan->id }}</td>
                      <td>{{ $pesanan->mobil->merek->nama . ' ' . $pesanan->mobil->tipe }}</td>
                      <td>{{ $pesanan->tanggal_pesan }}</td>
                      <td>{{ $pesanan->status_pesanan }}</td>
                      <td>
                        <a href="/pesanan/{{ $pesanan->id }}" class="btn btn-sm btn-info text-light">Detail</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-end">
              <a href="/" class="me-3">Kembali Ke Beranda</a>
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
@endsection
