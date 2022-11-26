@extends('layouts.main')

@section('page-title', $title)

@section('hero-area')
  <section class="section section-bg" id="call-to-action" style="background-image: url({{ asset('frontend/images/blog-image-fullscren-1-1920x700.jpg') }})">
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
    <div class="container col-10">
      @if ($gambar->count() < 1)
      <h4 class="text-center mt-5">Gambar belum ditambahkan pada mobil ini!</h4>
      @else
        <div class="owl-carousel owl-theme mt-4 mt-lg-5">
          @foreach ($gambar as $listGambar)
            <img src="{{ $listGambar->image() }}" alt="" srcset="" class="owl-img">
          @endforeach
        </div>
      @endif
      <h3 class="text-center mt-5">{{ $mobil->merek->nama . ' ' . $mobil->tipe }}</h3>
      <div class="row mt-5 col-md-10 mx-auto">
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
          <h6>Status</h6>
          <p class="mb-3">{{ $mobil->status }}</p>
        </div>
        <div class="col-md-8">
          <h6>Deskripsi</h6>
          <p>{!! $mobil->deskripsi !!}</p>
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-{{ $isBooked ? 'between' : 'end' }} align-items-center mx-auto mt-4">
          @if ($isBooked)
            <div class="text-danger">
              Sudah ada yang memesan mobil ini ;_;
            </div>
          @endif
          <div class="d-flex justify-content-end align-items-center">
            <button onclick="history.back()" class="btn btn-secondary me-2">Kembali</button>
            <a href="{{ $isBooked ? '#!' : '/mobil/' . $mobil->slug . '/pesan' }}" class="btn btn-primary">Pesan</a>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
@endsection