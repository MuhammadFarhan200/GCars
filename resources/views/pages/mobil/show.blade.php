@extends('layouts.main')

@section('page-title', $title)

@section('hero-area')
  <section class="section section-bg" id="call-to-action" style="background-image: url({{ asset('frontend/images/banner-image-1-1920x500.jpg') }})">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="cta-content pt-5">
            <h2 class="text-white">Detail Mobil</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('main-content')
  <section class="section" id="trainers">
    <div class="container">
      <div class="owl-carousel owl-theme mt-4 mt-lg-5">
        @foreach ($gambar as $listGambar)
          <img src="{{ $listGambar->image() }}" alt="" srcset="" class="owl-img">
        @endforeach
      </div>
      <h3 class="text-center mt-5">{{ $mobil->merek->nama . ' ' . $mobil->tipe }}</h3>
      <div class="row col-10 mt-5 mx-auto">
        <div class="col-md-4">
          <h6>Merek</h6>
          <p class="mb-3">{{ $mobil->merek->nama }}</p>
          <h6>Tipe</h6>
          <p class="mb-3">{{ $mobil->tipe }}</p>
          <h6>Warna</h6>
          <p class="mb-3">{{ $mobil->warna }}</p>
          <h6>Tahun Keluar</h6>
          <p class="mb-3">{{ $mobil->tahun_keluar }}</p>
          <h6>Harga</h6>
          <p class="mb-3">Rp{{ number_format($mobil->harga, 0, ',', '.') }}</p>
        </div>
        <div class="col-md-8">
          <h6>Deskripsi</h6>
          <p>{!! $mobil->deskripsi !!}</p>
        </div>
      </div>
      <div class="d-flex justify-content-end align-items-center">
        @if ($isBooked)
          <div class="text-danger mr-3">
            Sudah ada yang memesan mobil ini ;_;
          </div>
        @endif
        <div class="second-button mr-3">
          <button onclick="history.back()">Kembali</button>
        </div>
        <div class="main-button">
          <a href="{{ $isBooked ? '#!' : '/mobil/'. $mobil->slug. '/pesan' }}">Pesan</a>
        </div>
      </div>
    </div>
    </div>
  </section>
@endsection
