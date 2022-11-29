@extends('admin.layouts.main')

@section('title-page', $title)
@section('page-heading')
  <h2>Profile</h2>
  <p>Lihat data anda pada halaman ini</p>
@endsection

@section('page-content')
    <h3 class="text-center">Selamat Datang Di Halaman Profile!</h3>
    <div class="col-md-10 mx-auto">
        <div class="card mt-4">
            <div class="row align-items-center">
                <div class="col-md-5 col-xxl-4">
                    <img src="{{ $user->image() }}" alt="" class="card-img img-fluid shadow-sm" style="height: 300px; object-fit: cover; object-position: center">
                </div>
                <div class="col-md-7 col-xxl-8 mx-auto">
                    <div class="card-body">
                        <h4>Tentang Anda:</h4>
                        <p class="fs-5 mt-3 mb-2">Name: {{ auth()->user()->name }}</p>
                        <p class="fs-5 mb-2">Username: {{ auth()->user()->username }}</p>
                        <p>Bergabung Pada {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('d M, Y') }}</p>
                        <div class="d-flex justify-content-end align-items-center mt-4">
                            <a href="{{ route('admin') }}" class="btn btn-secondary px-3 me-3">Kembali</a>
                            <a href="{{ route('admin.profile.edit', auth()->user()->username) }}" class="btn btn-primary px-3 me-3">Edit Foto</a>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
