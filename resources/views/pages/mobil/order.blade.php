@extends('layouts.main')

@section('page-title', $title)

@section('hero-area')
  <section class="section section-bg" id="call-to-action" style="background-image: url({{ asset('frontend/images/banner-image-1-1920x500.jpg') }})">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="cta-content pt-5">
            <h2 class="text-white">Isi Detail Pesanan</h2>
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
        <div class="card-body p-4">
          <h3 class="mb-4">Isi Detail Pesanan Dibawah Ini</h3>
          <form action="/pesan" method="post">
            @csrf
            <input type="hidden" name="id_mobil" value="{{ $mobil->id }}">
            <div class="row justify-content-center align-items-center">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="">Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') ? old('nama_lengkap') : auth()->user()->name }}" autofocus class="form-control @error('nama_lengkap') is-invalid @enderror"
                    placeholder="Masukkan nama lengkap anda" required>
                  @error('nama_lengkap')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="">Nomor Handphone</label>
                  <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" autofocus class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukkan nomor handphone anda" required>
                  @error('no_hp')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="">Alamat Lengkap</label>
                  <textarea name="alamat_lengkap" id="alamat_lengkap" value="{{ old('alamat_lengkap') }}" autofocus class="form-control @error('alamat_lengkap') is-invalid @enderror" placeholder="Masukkan alamat lengkap anda" required rows="5"></textarea>
                  @error('alamat_lengkap')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="" class="d-block">Pesanan Untuk</label>
                  <div class="col-md-6">
                    <a href="/mobil/{{ $mobil->slug }}">{{ $mobil->merek->nama }} {{ $mobil->tipe }} tahun {{ $mobil->tahun_keluar }}</a>
                    <img src="{{ $mobil->gambar->count() > 0 ? asset('images/mobil/' . $mobil->gambar->first()->gambar) : asset('images/mobil/not-avaliable.jpg') }}" alt="" srcset="" style="border-radius: .5rem" class="w-100 d-block mt-1">
                  </div>
                </div>
                <div class="d-flex justify-content-end align-items-center mt-4">
                  <button class="btn btn-secondary me-2" onclick="history.back()">Kembali</button>
                  <button class="btn btn-primary" type="submit">Pesan Sekarang</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
