@extends('layouts.main')

@section('page-title', 'Home')

@section('hero-area')
  <!-- ***** Main Banner Area Start ***** -->
  <div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
      <source src="{{ asset('frontend/images/video.mp4') }}" type="video/mp4" />
    </video>

    <div class="video-overlay header-text">
      <div class="caption">
        <h6 class="d-none d-lg-block">Cari Mobil Impianmu Disini!</h6>
        <h2 class="d-none d-lg-block">Temukan <em>Mobil</em> yang Cocok Untukmu <em>Disini!</em></h2>
        <h3 class="d-block d-lg-none">Temukan <em>Mobil</em> yang Cocok Untukmu <em>Disini!</em></h3>
        <div class="main-button">
          <a href="#recommend">Lihat Mobil <i class="fa fa-arrow-down ml-1"></i></a>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Main Banner Area End ***** -->
@endsection

@section('main-content')
  <div class="container" id="recommend">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="section-heading">
          <h2>Rekomendasi <em>Mobil</em></h2>
          <img src="{{ asset('frontend/images/line-dec.png') }}" alt="">
          <p>Berikut ini merupakan beberapa mobil dengan spesifikasi unggulan yang kami rekomendasikan untuk anda.</p>
        </div>
      </div>
    </div>
    <div class="row">

      @foreach ($mobils as $mobil)
        <div class="col-lg-4">

          <div class="trainer-item">
            <div class="image-thumb">
              <img src="{{ asset('images/mobil/' . $mobil->gambar->first()->gambar) }}" alt="">
            </div>
            <div class="down-content">
              <span>
                Rp{{ number_format($mobil->harga, 0, ',', '.') }}
              </span>

              <h4>{{ $mobil->merek->nama . ' ' . $mobil->tipe }}</h4>

              <p>
                <i class="fa fa-calendar"></i> {{ $mobil->tahun_keluar }} &nbsp;&nbsp;&nbsp;
                <i class="bi bi-palette-fill"></i> {{ $mobil->warna }} &nbsp;&nbsp;&nbsp;
                @if ($mobil->status == 'tersedia')
                  <i class="fa fa-check"></i>
                @else
                  <i class="bi bi-x-lg"></i>
                @endif
                {{ $mobil->status }} &nbsp;&nbsp;&nbsp;
              </p>

              <ul class="social-icons">
                <li><a href="mobil/{{ $mobil->slug }}">Lihat Mobil <i class="fa fa-arrow-right ml-1"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      @endforeach

    </div>

    <br>

    <div class="main-button text-center">
      <a href="#">Lihat Lainnya <i class="fa fa-arrow-right ml-1"></i></a>
    </div>
  </div>
@endsection

@section('additional-content')
  <!-- ***** Call to Action Start ***** -->
  <section class="section section-bg" id="call-to-action" style="background-image: url({{ asset('frontend/images/banner-image-1-1920x500.jpg') }}">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="cta-content">
            <h2>Kirim <em>pesan</em> pada kami</h2>
            <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula, sit amet dapibus odio augue eget libero. Morbi tempus mauris a nisi luctus imperdiet.</p>
            <div class="main-button">
              <a href="#">Hubungi kami <i class="fa fa-arrow-right ml-1"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Call to Action End ***** -->
@endsection
