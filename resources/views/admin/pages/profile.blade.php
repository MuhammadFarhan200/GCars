@extends('admin.layouts.main')

@section('title-page', 'Profile Page')
@section('page-heading')
  <h2>Profie</h2>
  <p>Lihat data anda pada halaman ini</p>
@endsection

@section('page-content')
    <h3 class="text-center">Selamat Datang Di Halaman Profile!</h3>
    <div class="col-md-10 mx-auto">
        <div class="card shadow mt-4">
            <div class="row align-items-center">
                <div class="col-md-5 col-lg-4">
                    <img src="{{ auth()->user()->image() }}" alt="" class="card-img img-fluid shadow-sm">
                </div>
                <div class="col-md-7 col-lg-8 mx-auto">
                    <div class="card-body">
                        <h4>Tentang Anda:</h4>
                        <p class="fs-5 mt-4">Username: {{ auth()->user()->name }}</p>
                        <p class="fs-5 ">Email: {{ auth()->user()->email }}</p>
                        <p>Bergabung Pada {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('d M, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
