@extends('admin.layouts.main')

@section('title-page', 'Tambah Gambar Mobil')
@section('page-heading')
  <h2>Tambah Gambar Mobil</h2>
  <p>Tambahkan <b>gambar mobil</b> dengan menguoload gambar pada forum dibawah</p>
@endsection

@section('page-content')
  <div class="row mb-5">
    <div class="col-lg-12">
      <div class="card shadow">
        <div class="card-header">
          <h3>Tambah Gambar Mobil</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('tambahGambar.store') }}" method="post" id="my-dropzone" enctype="multipart/form-data" class="dropzone">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
