@extends('layouts.main')

@section('page-title', 'Merek')

@section('hero-area')
  <section class="section section-bg" id="call-to-action" style="background-image: url({{ asset('frontend/images/banner-image-1-1920x500.jpg') }})">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="cta-content pt-5">
            <h2 class="text-white">Pilih Merek</h2>
            <p>Cari mobil yang anda inginkan berdasarkan merek dibawah ini.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('main-content')
  <section class="section" id="trainers">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-start align-items-center mt-5">
        @foreach ($mereks as $merek)
          <a href="/mobil?merek={{ $merek->slug }}" class="translate-effect">
            <div class="trainer-item mx-2 px-4 mb-3">
              {{-- <div class="image-thumb text-center">
                <img src="https://www.freeiconspng.com/uploads/honda-logo-png-picture-20.png" alt="" class="mb-3" style="width: 50px; height: 45px; object-fit: contain">
              </div> --}}
              <div class="down-content">
                {{ $merek->nama }}
              </div>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </section>
@endsection
