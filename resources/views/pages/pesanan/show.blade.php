@extends('layouts.main')

@section('page-title', $title)

@section('hero-area')
  <section class="section section-bg" id="call-to-action" style="background-image: url({{ asset('frontend/images/banner-image-1-1920x500.jpg') }})">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="cta-content pt-5">
            <h2 class="text-white">Detail Pesanan</h2>
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
        <div class="card-body px-lg-5 pt-4">
          <table class="table table-borderless">
            <tbody>
              <tr>
                <td>Id Pesanan</td>
                <td>:</td>
                <td>{{ $pesanan->id }}</td>
              </tr>
              <tr>
                <td>Nama </td>
                <td>:</td>
                <td>
                  <a href="/user/{{ $pesanan->pemesan->user->username }}" target="_blank">{{ $pesanan->pemesan->nama_lengkap }}</a>
                </td>
              </tr>
              <tr>
                <td>No Hp</td>
                <td>:</td>
                <td>{{ $pesanan->pemesan->no_hp }}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $pesanan->pemesan->alamat_lengkap }}</td>
              </tr>
              <tr>
                <td>Mobil</td>
                <td>:</td>
                <td>
                    <a href="/mobil/{{ $pesanan->mobil->slug }}">
                        {{ $pesanan->mobil->merek->nama . ' ' . $pesanan->mobil->tipe . ' ' . $pesanan->mobil->tahun_keluar }}
                    </a>
                </td>
              </tr>
              <tr>
                <td>Harga</td>
                <td>:</td>
                <td>Rp{{ number_format($pesanan->mobil->harga, 0, ',', '.') }}</td>
              </tr>
              <tr>
                <td>Status Pesanan</td>
                <td>:</td>
                <td>{{ $pesanan->status_pesanan }}</td>
              </tr>
            </tbody>
          </table>
          <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center">
            <div class="mb-3 mb-lg-0">
                Untuk informasi lebih lanjut, silahkan untuk menghubungi <a href="https://wa.me/+628123456789" target="_blank">08123456789</a>
            </div>
            <a href="/pesanan" class="btn btn-primary ms-auto">Daftar Pesanan</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
