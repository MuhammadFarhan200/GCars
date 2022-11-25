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
            <div class="alert alert-info">
              <strong>Kamu belum melakukan pesanan apapun!</strong>
            </div>
          @else
            <table class="table table-hover text-center">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Id Pesanan</th>
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
                    <td>{{ $pesanan->tanggal_pesan }}</td>
                    <td>{{ $pesanan->status_pesanan }}</td>
                    <td>
                      <a href="/pesanan/{{ $pesanan->id }}" class="btn btn-sm btn-info text-light">Detail</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @endif
        </div>
      </div>
    </div>
  </section>
@endsection
