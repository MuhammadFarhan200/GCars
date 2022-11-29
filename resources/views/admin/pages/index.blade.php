@extends('admin.layouts.main')

@section('title-page', 'Dashboard')

@section('page-heading')
  <h2>Dashboard</h2>
  <p>Halaman Dashboard menampikan berapa banyak jumlah data dari masing-masing table</p>
@endsection

@section('page-content')
  <section class="row mb-4">
    <div class="col">
      <h4>
        Welcome back, {{ Auth::user()->name }}
        <img src="{{ asset('backend/images/hallo.png') }}" alt="" srcset="" style="width: 40px">
      </h4>
    </div>
  </section>
  <section class="row">
    <div class="col-6 col-lg-4 col-md-6">
      <div class="card">
        <div class="card-body px-4 py-4-5">
          <div class="row">
            <div class="col-md-4 col-xxl-5 d-flex justify-content-start ">
              <div class="stats-icon green mb-2">
                <i class="iconly-boldGraph"></i>
              </div>
            </div>
            <div class="col-md-8 col-xxl-7">
              <h5 class="text-muted font-semibold">Merek</h5>
              <h6 class="font-extrabold mb-0">{{ $jumlahMerek }} Data</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-4 col-md-6">
      <div class="card">
        <div class="card-body px-4 py-4-5">
          <div class="row">
            <div class="col-md-4 col-xxl-5 d-flex justify-content-start ">
              <div class="stats-icon purple mb-2">
                <i class="iconly-boldMore-Circle"></i>
              </div>
            </div>
            <div class="col-md-8 col-xxl-7">
              <h5 class="text-muted font-semibold">Mobil</h5>
              <h6 class="font-extrabold mb-0">{{ $jumlahMobil }} Data</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-4 col-md-6">
      <div class="card">
        <div class="card-body px-4 py-4-5">
          <div class="row">
            <div class="col-md-4 col-xxl-5 d-flex justify-content-start ">
              <div class="stats-icon blue mb-2">
                <i class="iconly-boldProfile"></i>
              </div>
            </div>
            <div class="col-md-8 col-xxl-7">
              <h5 class="text-muted font-semibold">Pengguna</h5>
              <h6 class="font-extrabold mb-0">{{ $jumlahPengguna }} Data</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-4 col-md-6">
      <div class="card">
        <div class="card-body px-4 py-4-5">
          <div class="row">
            <div class="col-md-4 col-xxl-5 d-flex justify-content-start ">
              <div class="stats-icon red mb-2">
                <i class="iconly-boldTicket-Star"></i>
              </div>
            </div>
            <div class="col-md-8 col-xxl-7">
              <h5 class="text-muted font-semibold">Pesanan</h5>
              <h6 class="font-extrabold mb-0">{{ $jumlahPesanan }} Data</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-4 col-md-6">
      <div class="card">
        <div class="card-body px-4 py-4-5">
          <div class="row">
            <div class="col-md-4 col-xxl-5 d-flex justify-content-start ">
              <div class="stats-icon primary mb-2">
                <i class="iconly-boldShield-Done"></i>
              </div>
            </div>
            <div class="col-md-8 col-xxl-7">
              <h5 class="text-muted font-semibold">Transaksi</h5>
              <h6 class="font-extrabold mb-0">{{ $jumlahTransaksi }} Data</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
