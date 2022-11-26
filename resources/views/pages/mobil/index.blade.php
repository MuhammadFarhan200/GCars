@extends('layouts.main')

@section('page-title', $title)

@section('hero-area')
  <section class="section section-bg" id="call-to-action" style="background-image: url({{ asset('frontend/images/blog-image-2-940x460.jpg') }})">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="cta-content pt-5">
            <h2 class="text-white">Daftar Mobil</h2>
            <p>Temukan dan pilih mobil impian yang anda cari pada daftar mobil dibawah ini.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('main-content')
  <section class="section" id="trainers">
    <div class="container">
      <div class="row justify-content-center mb-2 mt-5">
        <div class="col-lg-6 text-center">
          <h4 class="mb-3">Cari Mobil</h4>
          <form action="/mobil" method="GET">
            @if (request('merek'))
              <input type="hidden" name="merek" value="{{ request('merek') }}">
            @endif
            <div class="input-group mb-1">
              <input type="text" name="search" class="form-control" placeholder="Ketikkan sesuatu..." aria-describedby="basic-addon1" value="{{ request('search') ? request('search') : '' }}">
              <button type="submit" class="btn btn-primary" id="basic-addon1"><i class="fa fa-search"></i></button>
            </div>
          </form>
          @if (!request('merek'))
            <a href="/merek">
              <small>Atau cari berdasarkan merek <i class="fa fa-arrow-right"></i></small>
            </a>
          @endif
        </div>
      </div>
      @if ($mobils->count() < 1 && request('merek'))
        <div class="alert  alert-info col-6 mx-auto" role="alert">
          Mobil dengan merek {{ request('merek') }}, masih kosong ;_;
        </div>
      @elseif ($mobils->count() < 1 && request('search'))
        <div class="alert  alert-info col-6 mx-auto" role="alert">
          Tidak Ditemukan Apapun Untuk Kata Kunci {{ request('search') }} ;_;
        </div>
      @elseif ($mobils->count() < 1)
        <div class="alert  alert-info col-6 mx-auto" role="alert">
          Data mobil masih kosong ;_;
        </div>
      @else
        <div class="row justify-content-start align-items-center mt-5">
          @foreach ($mobils as $mobil)
            <div class="col-lg-4">
              <a href="/mobil/{{ $mobil->slug }}">
                <div class="trainer-item zoom-effect" data-aos="fade-up">
                  <div class="image-thumb">
                    <img src="{{ $mobil->gambar->count() > 0 ? asset('images/mobil/' . $mobil->gambar->first()->gambar) : asset('images/mobil/not-avaliable.jpg') }}" alt="">
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
              </a>
            </div>
          @endforeach
        </div>
      @endif

      @if (request('merek') || request('search'))
        <div class="main-button text-center mt-5">
          <a href="/mobil">Tampilkan Semua Mobil <i class="fa fa-arrow-right ml-1"></i></a>
        </div>
      @endif
    </div>
  </section>
@endsection
